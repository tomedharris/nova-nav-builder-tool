<?php

declare(strict_types=1);

namespace Tomedharris\NovaTreeBuilderTool;

class TreeBuilder
{
    public function build(array $nodes): array
    {
        return $this->recursiveBuild($nodes, null);
    }

    protected function recursiveBuild(array $nodeList, $parentId): array
    {
        $levelNodes = [];
        $childrenNodes = [];

        foreach ($nodeList as $node) {
            /** @var Nodeable $node */
            if ($node->parentNodeId() === $parentId) {
                $levelNodes[] = new NodeWrapper($node);
            } else {
                $childrenNodes[] = $node;
            }
        }

        foreach ($levelNodes as $nodeWrapper) {
            /** @var NodeWrapper $nodeWrapper */
            $nodeWrapper->setChildren($this->recursiveBuild($childrenNodes, $nodeWrapper->node()->nodeId()));
        }

        return $levelNodes;
    }
}
