<?php

namespace Modules\PkgGestionInscription\models;


use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public function atelier()
    {
        return $this->belongsTo(Atelier::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
