<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

     protected $fillable = [
        'matricule',
        'marque_id',
        'couleur',
        'client_id',
        'type_id',
        'emplacement_id',
        'abonnement_id'

    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function marque(){
        return $this->belongsTo(Marque::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function emplacement(){
        return $this->belongsTo(Emplacement::class);
    }

    public function Abonnement(){
        return $this->belongsTo(Abonnement::class, 'abonnement_id');
    }
    
}
