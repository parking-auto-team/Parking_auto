<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'status',



    ];

    public function client(){
        return  $this->belongsTo(Client::class);
    }

    public function vehicule(){
        return $this->hasOne(Vehicule::class);
    }



}
