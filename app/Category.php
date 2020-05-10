<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug'];



    public function Article()
    {    
        return $this->belongsTo(Article::class);
    }
}
