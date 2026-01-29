<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
     protected $table = "ingredients";
    protected $fillable = ["nom", "recipe_id"];

    public function recipe(){
        return $this->belongsTo(Recipe::class, "recipe_ingredient");
    }

}
