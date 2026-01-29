<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = "recipes";
    protected $fillable = ["user_id", "category_id", "title", "description", "image", "temp_prepa", "temp_cuission", "personnes", "astuces", "id_cuisine"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id_category');
    }
        public function cuisine()
    {
        return $this->belongsTo(Cuisine::class, 'id_cuisine', 'id');
    }
    public function etapes()
    {
        return $this->hasMany(Etape::class, "id_recette", "id");
    }
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class,"recipe_id", "id");
    }
}
