<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays and JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relations éventuelles (si configurées).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class);
    }

    public function emplacement()
    {
        return $this->hasOne(Emplacement::class);
    }

    public function marques()
    {
        return $this->hasMany(Marque::class);
    }

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}
