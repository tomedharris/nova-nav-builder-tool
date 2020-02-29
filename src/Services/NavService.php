<?php

namespace Tomedharris\NovaNavBuilderTool\Services;

class NavService
{
    public function getTreeableType($type)
    {
        return Tree::class;
    }
}
