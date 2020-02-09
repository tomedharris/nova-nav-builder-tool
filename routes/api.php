<?php

use Kamboo\Nav\Nav;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. You're free to add
| as many additional routes to this file as your tool may require.
|
*/

Route::get('/nav/{id}/root-elements', function (Request $request, int $id) {
    // TODO make this flexible wrt number of levels.
    return Nav::query()
        ->with(['elements' => function (Builder $query) {
            $query->root();
        }])
        ->with('elements.children')
        ->with('elements.children.children')
        ->findOrFail($id)
        ->elements;
});
