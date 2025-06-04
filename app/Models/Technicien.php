<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email', // email optionnel
    ];

    /**
     * Get the section that the technicien belongs to.
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get the equipes that the technicien is part of.
     */
     public function equipes()
    {
        return $this->belongsToMany(EquipeDisponible::class, 'equipe_technicien');
    }
}
