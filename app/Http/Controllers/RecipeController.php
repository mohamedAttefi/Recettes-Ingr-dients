<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;


class RecipeController extends Controller
{
    public function showAddRecipeForm() {
        return view("addRecipe");
    }

    public function showMyRecipe()
    {
        $recipes  = Recipe::where("user_id", Auth::user()->id)->get();
        print_r($recipes);
        return view('myRecipes', ["recipes" => $recipes]);
    }
}
