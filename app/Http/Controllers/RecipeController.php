<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Cuisine;
use App\Models\Ingredient;
use App\Models\Etape;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::all()->where('is_deleted', false);
        $categories = Category::all();
        return view("recipe.allRecipes", ["recipes" => $recipes, "categories" => $categories]);
    }
    public function showAddRecipeForm()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $categories = Category::all();
        $cuisines = Cuisine::all();

        return view("recipe.addRecipe", ["categories" => $categories, "cuisines" => $cuisines]);
    }

    public function showMyRecipe()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $recipes  = Recipe::where('user_id', Auth::id())->where('is_deleted', false)->get();

        return view('recipe.myRecipes', ['recipes' => $recipes]);
    }
    public function store(Request $request)
    {
        $imagePath = $request->image ?? null;

        $recipe = Recipe::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'id_cuisine' => $request->cuisine ?? null,
            'difficulty' => $request->difficulty,
            'temp_prepa' => $request->prep_time,
            'temp_cuission' => $request->cook_time ?? null,
            'personnes' => $request->servings,
            'image' => $imagePath,
            'astuces' => $request->chef_notes ?? null,
        ]);

        foreach ($request->ingredients as $item) {
            Ingredient::create([
                "nom" => $item["name"],
                "recipe_id" => $recipe->id
            ]);
        }

        foreach ($request->steps as $index => $stepContent) {
            Etape::create([
                'id_recette' => $recipe->id,
                'description' => $stepContent,
                'numero_etape' => $index + 1
            ]);
        }
        return redirect()->route('myRecipe');
    }

    public function showRecipe(Request $request)
    {
        $id = $request->query('id');
        $recipe = Recipe::find($id);
        return view("recipe.recipe_detail", ["recipe" => $recipe]);
    }

    public function showEditRecipe(Request $request)
    {
        $id = $request->query('id');
        $recipe = Recipe::find($id);
        $categories = Category::all();
        $cuisines = Cuisine::all();
        return view("recipe.editRecipe", ["recipe" => $recipe, "categories" => $categories, "cuisines" => $cuisines]);
    }

    public function update(Request $request)

    {
        $id = $request->id;
        echo $id;
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'difficulty' => 'required|in:easy,medium,hard',
            'prep_time' => 'required|integer|min:0',
            'cook_time' => 'required|integer|min:0',
            'servings' => 'required|integer|min:1',
        ]);

        $recipe = Recipe::find($id);

        $recipe->update([
            'title' => $request->title,
            'description' => $request->description,
            'difficulty' => $request->difficulty,
            'temp_prepa' => $request->prep_time,
            'temp_cuission' => $request->cook_time,
            'personnes' => $request->servings,
        ]);

        return redirect()
            ->route('myRecipe', $recipe->id)
            ->with('success', 'Recipe updated successfully!');
    }

    public function delete(Request $request){
        $id = $request->id;
        $recipe = Recipe::find($id);
        
        if ($recipe) {
            $recipe->update([
                "is_deleted" => true
            ]);
        }
        
        return redirect()->route('myRecipe');
    }
}
