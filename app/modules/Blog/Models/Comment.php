<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Comment extends Model
{

    use HasFactory;
    protected $fillable = ["content","user_id","article_id"];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
