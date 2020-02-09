<?php

namespace Tomeh\NovaNavBuilderTool;

use Laravel\Nova\ResourceTool;

class NovaNavBuilderTool extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Nav Builder';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-nav-builder-tool';
    }
}
