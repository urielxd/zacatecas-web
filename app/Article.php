<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Article extends Model
{
    protected $fillable = [ 'image', 'body', 'category_id' ];

    public function setImageAttribute($image)
    {
        $file = array('image' => Input::file('image'));
        if ($file !== null) {
            $destinationPath = 'images/articles';
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            $this->attributes['image'] = $fileName;
            Input::file('image')->move($destinationPath, $fileName);
        }
    }

    function User()
    {
        return $this->belongsTo(User::class);
    }
    function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
