<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frontUserController extends Controller
{


    public function index(Request $request , Article $article )
    {

// it ok
//        if ($request->has('search')) {
//        $articles= $article->where('name', $request->input('search'))->get();
//    }
//    else {
//        $articles = Article::get();
//
//    }
//        return view('front.article', compact('articles'));



            $articles = Article::where('name', 'like', '%' . $request->search. '%')->get();

        return view('front.article', compact('articles'));



        //        if($request->has('search')){
//            $articles = Article::search($request->input('search'))->get();
//        }else{
//            $articles = Article::get();
//        }
//        return view('front.article', compact('articles'));


    }


    public function show()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('back.article.create', compact('categories'));
    }


}
