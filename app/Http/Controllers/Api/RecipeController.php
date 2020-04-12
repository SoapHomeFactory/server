<?php

namespace App\Http\Controllers\Api;

use App\Recipe;
use App\Ingredients;

use App\Lye;
use App\Water;
use App\Fat;
use App\Perfume;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return $recipes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = Recipe::create([
          'name' => $request->input('recipe')
        ]);

        $ingredients = $request->input('ingredients');

        foreach($ingredients as $ingredient)
        {
            $strType = $ingredient['type'];
            $type = call_user_func_array(
                          [$this->getModelName($strType), 'firstOrCreate'],
                          [$ingredient["details"]]
                    );

            $list[] = $type->cookable()->create([
              'recipe_id' => $recipe->id,
              'weight' => $ingredient['weight']
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return $recipe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
    }
}
