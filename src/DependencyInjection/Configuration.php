<?php

namespace Gkite13\VtigerApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('gkite13_vtiger_api');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->arrayNode('api')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('site_url')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('user')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('access_key')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('cache')
                    ->children()
                        ->scalarNode('pool')
                        ->end()
                        ->scalarNode('cache_key')
                        ->end()
                        ->scalarNode('expire_time')
                        ->end()
                ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}
