<?php
namespace Corley\MaintenanceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('corley_maintenance');

        $rootNode
            ->children()
                ->scalarNode("page")->defaultValue("CorleyMaintenanceBundle:maintenance.html")->end()
                ->scalarNode("web")->defaultValue('%kernel.root_dir%/../web')->end()
                ->scalarNode("soft_lock")->defaultValue('soft.lock')->end()
                ->scalarNode("hard_lock")->defaultValue('hard.lock')->end()
                ->booleanNode("symlink")->defaultFalse()->end()
                ->arrayNode("whitelist")
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->variableNode('paths')
                            ->defaultValue(array())
                        ->end()
                        ->variableNode('ips')
                            ->defaultValue(array())
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
