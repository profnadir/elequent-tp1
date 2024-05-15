<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //fillable
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    //relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories(){
        return $this->belongsToMany(Categorie::class);
    }
}
