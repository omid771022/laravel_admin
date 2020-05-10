<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{

    protected $fillable=['body','name','email','article_id'];

    public function Article (){
        return $this->hasOne(Article::class);
    }
}

