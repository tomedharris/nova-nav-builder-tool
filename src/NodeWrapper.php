<?php

declare(strict_types=1);

namespace Tomedharris\NovaTreeBuilderTool;

use Tomedharris\NovaTreeBuilderTool\Exceptions\InvalidChildException;

class NodeWrapper
{
    /**
     * @var Nodeable
     */
    protected $nodeable;

    /**
     * @var array
     */
    protected $children = [];

    public function __construct(Nodeable $nodeable)
    {
        $this->nodeable = $nodeable;
    }

    public function node(): Nodeable
    {
        return $this->nodeable;
    }

    public function setChildren(array $children)
    {
        foreach ($children as $child) {
            if (!$child instanceof NodeWrapper) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Set children should be an array of NodeWrapper instances. Got %s',
                        is_object($child) ? get_class($child) : (string) $child
                    )
                );
            }

            if ($child->node()->parentNodeId() !== $this->node()->nodeId()) {
                throw new InvalidChildException($this, $child);
            }
        }

        $this->children = $children;
    }

    public function getChildren(): array
    {
        return $this->children;
    }
}
