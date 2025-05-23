<?php

namespace modules\PkgGestionInscription\models;


use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}