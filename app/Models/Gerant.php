<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Gerant extends Authenticatable
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
     * Relation éventuelle avec User si tu as un user_id dans la table gerants.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
