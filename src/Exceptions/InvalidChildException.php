<?php

declare(strict_types=1);

namespace Tomedharris\NovaTreeBuilderTool\Exceptions;

use Throwable;
use Tomedharris\NovaTreeBuilderTool\NodeWrapper;

class InvalidChildException extends NovaTreeBuilderToolException
{
    public function __construct(NodeWrapper $parent, NodeWrapper $child, $code = 0, Throwable $previous = null)
    {
        $message = sprintf(
            'Cannot add child node [%s] with parent node id [%s], parent node has id [%s]',
            $child->node()->nodeId(),
            $child->node()->parentNodeId(),
            $parent->node()->nodeId()
        );

        parent::__construct($message, $code, $previous);
    }
}
