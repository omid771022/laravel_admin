<?php

namespace App\Http\Controllers;


use App\Article;
use App\Category;
use App\comment;

use Illuminate\Http\Request;

class  commentController extends Controller
{

    public function index()
    {
        $comments = comment::orderBy('id', 'DESC')->paginate(20);
        return view('back.comment.comments', compact('comments'));
    }


    public function edit(comment $comment)
    {
        return view('back.comment.edit', compact('comment'));
    }


    public function update(Request $request, comment $comment)
    {
        $messages = [
            'name.required' => 'فیلد را  پر کنید',
            'email.required' => 'فیلد را  پر کنید',
            'body.unique' => ' یک مقدار  خاص وارد کنید ',
        ];
        $vlidatedDate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:categories',
            'body' => 'required',
        ], $messages);

        $comment->update($request->all());
        $comment->comments()->sync($request->comments);
        $msg = 'با موفقیت بروز رسانی شد ';
        return redirect('/admin/comments')->with('success', $msg);
    }

    public function destroy(comment $comment)
    {
        $comment->delete();
        $msg = "با موفقیت حذف شد ";
        return redirect('/admin/comments')->with('success', $msg);
    }

    public function status(comment $comment)
    {
        if ($comment->status == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }

        $comment->save();
        $msg = 'بروز رسانی با موفقیت انجام شد ';
        return redirect('admin/comments')->with('success', $msg);
    }

    public function show()
    {

    }
}
