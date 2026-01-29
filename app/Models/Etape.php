<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $table = "etapes";
    protected $primaryKey = 'id_etape';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ["id_recette", "numero_etape", "description"];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
