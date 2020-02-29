<?php

declare(strict_types=1);

namespace Tomedharris\NovaTreeBuilderTool;

/**
 * @property string $nodeIdAttribute
 * @property string $parentNodeIdAttribute
 * @method mixed primaryKey()
 */
trait EloquentNodeableTrait
{
    public function nodeId()
    {
        if (property_exists($this, 'nodeIdAttribute')) {
            return $this->{$this->nodeIdAttribute};
        }

        return $this->primaryKey();
    }

    public function parentNodeId()
    {
        $attribute = property_exists($this, 'parentNodeIdAttribute') ? $this->parentNodeIdAttribute : 'parent_id';

        return $this->$attribute;
    }
}
