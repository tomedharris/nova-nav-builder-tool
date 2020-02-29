<?php

namespace Tomedharris\NovaTreeBuilderTool\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tomedharris\NovaTreeBuilderTool\Exceptions\InvalidChildException;
use Tomedharris\NovaTreeBuilderTool\NodeWrapper;
use Tomedharris\NovaTreeBuilderTool\Tests\Helpers\Nodeable;

class NodeWrapperTest extends TestCase
{
    /**
     * Node wrappers require a node to wrap so this is a basic test stub.
     * @var Nodeable
     */
    protected $node;

    public function setUp(): void
    {
        $this->node = new Nodeable(1, null);
    }

    /**
     * @test
     */
    public function it_wraps_a_nodeable()
    {
        $nodeWrapper = new NodeWrapper($this->node);

        $this->assertEquals($this->node, $nodeWrapper->node());
    }

    /**
     * @test
     */
    public function it_has_children()
    {
        $nodeWrapper = new NodeWrapper($this->node);
        $child = new NodeWrapper(new Nodeable(2, $this->node->nodeId()));
        $nodeWrapper->setChildren([$child]);

        $this->assertCount(1, $nodeWrapper->getChildren());
        $this->assertEquals($child, $nodeWrapper->getChildren()[0]);
    }

    /**
     * @test
     */
    public function it_cannot_have_a_non_node_wrapper_child()
    {
        $nodeWrapper = new NodeWrapper($this->node);
        $this->expectException(\InvalidArgumentException::class);
        $nodeWrapper->setChildren(['not a node wrapper']);
    }

    /**
     * @test
     */
    public function it_cannot_have_a_child_which_has_a_different_node_parent_id()
    {
        $nodeWrapper = new NodeWrapper($this->node);
        $child = new NodeWrapper(new Nodeable(2, $this->node->nodeId() + 100));

        $this->expectException(InvalidChildException::class);
        $nodeWrapper->setChildren([$child]);
    }
}
