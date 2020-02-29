<?php

namespace Tomedharris\NovaTreeBuilderTool\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Tomedharris\NovaTreeBuilderTool\NodeWrapper;
use Tomedharris\NovaTreeBuilderTool\Tests\Helpers\Nodeable;
use Tomedharris\NovaTreeBuilderTool\TreeBuilder;

class TreeBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function tree_builder_can_build_node_tree_from_flat_list()
    {
        $flatNodes = [
            new Nodeable(1, null),
            new Nodeable(2, 1),
            new Nodeable(3, 1),
            new Nodeable(4, 2),
            new Nodeable(5, null),
            new Nodeable(6, 5),
        ];

        $treeBuilder = new TreeBuilder();
        $trees = $treeBuilder->build($flatNodes);

        // Two root nodes.
        $this->assertCount(2, $trees);

        /** @var NodeWrapper $node */
        $node = $trees[0];
        $this->assertCount(2, $node->getChildren());

        $node = $node->getChildren()[0];
        $this->assertCount(1, $node->getChildren());
    }
}
