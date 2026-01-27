<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
     protected $table = "ingredients";
    protected $fillable = ["name"];

    public function recipe(){
        return $this->belongsToMany(Recipe::class, "recipe_ingredient")->using(IngredientRecipe::class);
    }

}
