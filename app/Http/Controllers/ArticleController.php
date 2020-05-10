<?php

namespace App\Http\Controllers;


use App\Article;
use App\Category;
use App\comment;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        
        $articles = Article::orderBy('id', 'DESC')->paginate(20);
        return view('back.article.article', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('back.article.create', compact('categories'));
    }


    public function store(ArticleRequest  $request)
    {


        $article = new Article();
        $article->name = $request->input('name');
        $article->slug = $request->input('slug');
        $article->description = $request->input('description');
        $article->user_id = $request->input('user_id');
        $article->status = $request->input('status');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('image/article/', $filename);
            $article->img = $filename;
        } else {
            return $request;
            $article->img ='';
        }
        $article->save();
        $msg = 'پرشد';
        return redirect('/admin/articles')->with('success', $msg);

    }


    public function show(Article $articles )
    {
        $articles->increment('hit');
        $comments = Comment::orderBy('id' ,'DESC')->where('status',1)->paginate(4);
        return view('front.showarticle', compact('articles','comments'));

    }

    public function edit(Article $articles)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('back.article.edit', compact('articles', 'categories'));
    }


    public function update(Request $request, Article $articles)
    {
        $messages = [
            'name.required' => 'فیلد را  پر کنید',
            'slug.required' => 'فیلد را  پر کنید',
            'slug.unique' => ' یک مقدار  خاص وارد کنید ',
        ];
        $vlidatedDate = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ], $messages);

        $articles->update($request->all());
        $articles->categories()->sync($request->categories);
        $msg = 'پرشد';
        return redirect('/admin/articles')->with('success', $msg);

    }


    public function destroy(Article $articles)
    {
        $articles->delete();
        $msg = "با موفقیت حذف شد ";
        return redirect('/admin/articles')->with('success', $msg);
    }


    public function status(Article $articles)
    {
        if ($articles->status == 1) {
            $articles->status = 0;
        } else {
            $articles->status = 1;
        }

        $articles->save();
        $msg = 'بروز رسانی با موفقیت انجام شد ';
        return redirect('admin/articles')->with('success', $msg);
    }

}
