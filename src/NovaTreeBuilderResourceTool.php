<?php

namespace Tomedharris\NovaTreeBuilderTool;

use Laravel\Nova\ResourceTool;

class NovaTreeBuilderResourceTool extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Tree Builder';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-tree-builder-resource-tool';
    }
}
