<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
    ];

    public function client(){
        return  $this->belongsTo(Client::class);
    }

    public function types(){
        return $this->hasMany(Type::class);
    }

    public function vehicules(){
        return $this->hasMany(Vehicule::class);
    }
}
