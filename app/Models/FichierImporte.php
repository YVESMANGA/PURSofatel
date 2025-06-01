<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichierImporte extends Model
{
    //
    protected $fillable = ['nom_fichier','user_id'];

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'importe_par');
    }
}
