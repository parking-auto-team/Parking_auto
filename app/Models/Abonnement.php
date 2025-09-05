<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'duree',
        'montant',
    ];

    // app/Models/Abonnement.php

public function client()
{
    return $this->belongsTo(Client::class);
}

public function vehicule()
{
    return $this->belongsTo(Vehicule::class, 'abonnement_id');
}

public function emplacement()
{
    return $this->belongsTo(Emplacement::class);
}



}
