<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $table = "etape";
    protected $fillable = ["recipe_id", "etape_order", "instructions"];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
