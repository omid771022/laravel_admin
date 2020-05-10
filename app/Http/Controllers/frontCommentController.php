<?php

namespace App\Http\Controllers;

use App\Article;

use App\comment;
use App\Mail\commentSend;
use App\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Codec\OrderedTimeCodec;
use Illuminate\Support\facades\Mail;
class frontCommentController extends Controller
{

public function store(Article $articles ,Request $request){

    $messages = [
        'email.required' => ' عکس تکراریست ',
        'name.required' => 'فیلد را  پر کنید',
        'body.required' => 'فیلد را  پر کنید',

    ];
    $vlidatedDate = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'body' => 'required',
    ], $messages);


    Comment::create([
        'name' => request('name'),
        'email' => request('email'),
        'body' => request('body'),
        'article_id' => $articles->id,
    ]);
$msg='نظرر شما ثبت  لطفا منتظر تایید مدیران باشید ';
    return redirect('admin/articles/articles/'.$articles->id)->with('success', $msg);


}

}
