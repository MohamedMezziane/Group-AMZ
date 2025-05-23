<?php

namespace  modules\PkgGestionInscription\models;


use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }

    public function atelier()
    {
        return $this->belongsTo(Atelier::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}
