<?php

namespace Modules\PkgApprenants\models;

use Modules\PkgGestionInscription\models\Inscription;

use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    protected $fillable = ['nom'];
    
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}