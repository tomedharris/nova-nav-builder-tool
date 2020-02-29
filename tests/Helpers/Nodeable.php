<?php

namespace Tomedharris\NovaTreeBuilderTool\Tests\Helpers;

class Nodeable implements \Tomedharris\NovaTreeBuilderTool\Nodeable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int|null
     */
    public $parentId;

    public function __construct(int $id, ?int $parentId)
    {
        $this->id = $id;
        $this->parentId = $parentId;
    }

    public function nodeId()
    {
        return $this->id;
    }

    public function parentNodeId()
    {
        return $this->parentId;
    }
}
