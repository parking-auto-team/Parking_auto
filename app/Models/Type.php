<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function marques(){
        return $this->hasMany(Marque::class);
    }

    public function vehicules(){
        return $this->hasMany(Vehicule::class);
    }
}
