<?php

namespace SendinBlue\SendinBlueApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sendinblue_api');

        $rootNode->children()
                    ->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
                    ->integerNode('timeout')->min(0)->max(60000)->defaultValue(30000)->end() //default timeout: 30 secs
                  ->end();

        return $treeBuilder;
    }
}
