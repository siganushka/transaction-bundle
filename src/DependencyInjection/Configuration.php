<?php

declare(strict_types=1);

namespace Siganushka\TransactionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder<'array'>
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('siganushka_transaction');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}
