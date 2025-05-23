<?php

namespace Modules\PkgTableauDaffichage\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['titre', 'image_url', 'description', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(PostCategory::class, 'categorie_id');
    }
}
