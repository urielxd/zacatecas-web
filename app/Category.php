<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    function User ()
    {
        return $this->belongsTo(User::class);
    }
    function Article ()
    {
        return $this->hasOne(Article::class);
    }
}
