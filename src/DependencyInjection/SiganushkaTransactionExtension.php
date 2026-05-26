<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\DependencyInjection;

use Doctrine\ORM\Events;
use Siganushka\TransactionBundle\Doctrine\TransactionNumberGeneratorListener;
use Siganushka\TransactionBundle\Generator\TransactionNumberGeneratorInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class SiganushkaTransactionExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new PhpFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.php');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach (Configuration::$resourceMapping as $configName => [, $repositoryClass]) {
            $repository = $container->findDefinition($repositoryClass);
            $repository->setArgument('$entityClass', $config[$configName]);
        }

        $container->setAlias(TransactionNumberGeneratorInterface::class, $config['transaction_number_generator']);

        $transactionNumberGeneratorListener = $container->findDefinition(TransactionNumberGeneratorListener::class);
        $transactionNumberGeneratorListener->addTag('doctrine.orm.entity_listener', ['event' => Events::prePersist, 'entity' => $config['transaction_class'], 'priority' => 8]);
    }
}
