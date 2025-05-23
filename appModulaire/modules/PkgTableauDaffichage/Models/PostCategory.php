<?php

namespace Modules\PkgTableauDaffichage\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_categories'; 
    protected $fillable = ['nom'];
    public function posts()
    {
        return $this->hasMany(Post::class, 'categorie_id');
    }
}
