<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $table = "cuisines";
    protected $fillable = ["name", "color", "description"];
    public function recipe()
    {
        return $this->hasMany(Recipe::class);
    }
}
