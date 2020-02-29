<?php

declare(strict_types=1);

namespace Tomedharris\NovaTreeBuilderTool;

interface Nodeable
{
    public function nodeId();
    public function parentNodeId();
}
