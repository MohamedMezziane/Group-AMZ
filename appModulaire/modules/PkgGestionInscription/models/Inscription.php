<?php

namespace Modules\PkgGestionInscription\models;
use Modules\PkgApprenants\models\Apprenant;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    public function apprenant()
{
    return $this->belongsTo(Apprenant::class, 'apprenantId'); // Adjust if necessary
}

public function atelier()
{
    return $this->belongsTo(Atelier::class, 'atelierId');
}

public function groupe()
{
    return $this->belongsTo(Groupe::class, 'groupeId');
}
}
