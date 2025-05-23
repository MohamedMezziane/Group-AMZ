<?php

namespace  modules\PkgGestionInscription\models;


use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
