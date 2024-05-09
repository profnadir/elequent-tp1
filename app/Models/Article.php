<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //fillable
    protected $fillable = [
        'title', 'content', 'author'
    ];

    //relations

       
}
