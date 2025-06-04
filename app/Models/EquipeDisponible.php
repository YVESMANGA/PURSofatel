<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipeDisponible extends Model
{
    protected $fillable = ['nom_equipe', 'technologie', 'service', 'chef_zone_id', 'section_id'];

    public function techniciens()
    {
        return $this->belongsToMany(Technicien::class, 'equipe_technicien');
    }

    public function section() {
    return $this->belongsTo(Section::class); // ou Zone si le modèle s'appelle Zone
}

    public function chefZone()
    {
        return $this->belongsTo(ChefZone::class, 'chef_zone_id');
    }
}
