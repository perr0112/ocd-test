<?php

use App\Models\Person;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-relations', function () {
    $parent = Person::find(1);

    $children = $parent->children;
    $parents = $parent->parents;

    return [
        'parent' => $parent,
        'children' => $children,
        'parents' => $parents,
    ];
});
