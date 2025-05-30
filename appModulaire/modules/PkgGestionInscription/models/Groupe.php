<?php

namespace Modules\PkgGestionInscription\models;


use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = ['nom', 'description', 'atelierId', 'maxParticipants'];
    public function atelier(){
        return $this->belongsTo(Atelier::class, 'atelierId');
    }
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
