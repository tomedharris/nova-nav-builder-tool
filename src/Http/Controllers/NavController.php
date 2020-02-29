<?php

namespace Tomedharris\NovaNavBuilderTool\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Kamboo\Nav\Nav;
use Tomedharris\NovaNavBuilderTool\Services\NavService;

class NavController
{
    /**
     * @var NavService
     */
    protected $treeService;

    public function __construct(NavService $treeService)
    {
        $this->treeService = $treeService;
    }

    public function structure(int $navId)
    {
        // TODO make this flexible wrt number of levels.
        $nav = Nav::query()->with('elements')->findOrFail($navId);

        $elements = $nav->elements;


//            ->with(['elements' => function (Builder $query) {
//                $query->root();
//            }])
//            ->with('elements.children')
//            ->with('elements.children.children')
//            ->findOrFail($navId)
//            ->elements;
    }

    public function updateStructure()
    {
        dd('here');
    }
}
