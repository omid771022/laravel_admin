<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sample;
use App\Category;
use App\comment;
use App\Article;

class homeContrioller extends Controller
{
    public function index()
    {
        $samples= sample::orderBy('id', 'DESC')->get();
        $tags = $samples->unique('tag');
        return view('front.index', compact('samples', 'tags'));
    }

}
