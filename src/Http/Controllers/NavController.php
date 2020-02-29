<?php

namespace Tomedharris\NovaTreeBuilderTool\Http\Controllers;

class NavController
{
    public function structure(int $navId)
    {
        // TODO make this flexible wrt number of levels.
//        $nav = Nav::query()->with('elements')->findOrFail($navId);
//
//        $elements = $nav->elements;


//            ->with(['elements' => function (Builder $query) {
//                $query->root();
//            }])
//            ->with('elements.children')
//            ->with('elements.children.children')
//            ->findOrFail($navId)
//            ->elements;
    }
}
