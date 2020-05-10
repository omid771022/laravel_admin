<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;


class Article extends Model
{
use Searchable;


    protected $fillable = ['slug', 'name', 'description', 'user_id', 'status', 'img'];
    protected $attributes = [
        'hit' => 1
    ];
    // public function categories()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    
    public  function user()
    {
        return $this->belongsTo(User::class);
    }



    public function  comments()
    {
        return $this->hasMany(comment::class);
    }


    public function Category()
    {
        return $this->hasMany(Category::class);
    }



}
