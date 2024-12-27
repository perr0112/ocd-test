<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PersonController extends Controller
{
    /**
     * Affiche la liste des personnes avec leur créateur
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $people = Person::with('creator')->get();

        /* print_r($people->creator);
        foreach ($people as $person) {
            echo $person->creator;
        } */

        return PersonResource::collection($people);

        /* return response()->json([
            'data' => $people,
        ]); */
    }
}
