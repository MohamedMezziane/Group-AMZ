<?php

namespace Modules\PkgGestionInscription\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'dateDebut', 'dateFin'];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
