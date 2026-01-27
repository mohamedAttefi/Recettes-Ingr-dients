<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = "recipes";
    protected $fillable = ["user_id", "category_id", "title", "description", "image"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function etapes()
    {
        return $this->hasMany(Etape::class);
    }
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, "recipe_ingredient")->using(IngredientRecipe::class);
    }
}
