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

    /**
     * @TODO document
     * @param string $label
     * @return $this
     */
    public function labelAttribute(string $label)
    {
        return $this->withMeta(compact('label'));
    }

    /**
     * @TODO document
     * @param string $modelClass
     * @param string $resourceFkAttribute
     * @return $this
     */
    public function eloquent(string $modelClass, string $resourceFkAttribute)
    {
        return $this->withMeta([
            'type' => 'eloquent',
            'model_class' => $modelClass,
            'resource_fk_attribute' => $resourceFkAttribute
        ]);
    }
}
