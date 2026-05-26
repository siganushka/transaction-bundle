<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\DependencyInjection;

use Siganushka\TransactionBundle\Entity\Transaction;
use Siganushka\TransactionBundle\Generator\TransactionNumberGenerator;
use Siganushka\TransactionBundle\Generator\TransactionNumberGeneratorInterface;
use Siganushka\TransactionBundle\Repository\TransactionRepository;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public static array $resourceMapping = [
        'transaction_class' => [Transaction::class, TransactionRepository::class],
    ];

    /**
     * @return TreeBuilder<'array'>
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('siganushka_transaction');
        $rootNode = $treeBuilder->getRootNode();

        foreach (static::$resourceMapping as $configName => [$entityClass]) {
            $rootNode->children()
                ->scalarNode($configName)
                    ->defaultValue($entityClass)
                    ->validate()
                        ->ifTrue(static fn (mixed $v): bool => \is_string($v) && !is_a($v, $entityClass, true))
                        ->thenInvalid('The value must be instanceof '.$entityClass.', %s given.')
                    ->end()
                ->end()
            ;
        }

        $rootNode->children()
            ->scalarNode('transaction_number_generator')
                ->cannotBeEmpty()
                ->defaultValue(TransactionNumberGenerator::class)
                ->validate()
                    ->ifTrue(static fn (mixed $v): bool => \is_string($v) && !is_subclass_of($v, TransactionNumberGeneratorInterface::class, true))
                    ->thenInvalid('The value must be instanceof '.TransactionNumberGeneratorInterface::class.', %s given.')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
