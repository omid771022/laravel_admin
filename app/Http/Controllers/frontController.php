<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index(){
        return view('front.index');
    }
}
