<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\sample;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class SampleController extends Controller
{

    public function index()
    {
        $samples = sample::orderBy('id', 'DESC')->paginate(20);
        return view('back.samples.sample', compact('samples'));
    }


    public function create()
    {
return view('back.samples.create');
    }


    public function store(Request $request)
    {
        $messages = [
            'tag.required' => ' عکس تکراریست ',
            'name.required' => 'فیلد را  پر کنید',
        ];
        $vlidatedDate = $request->validate([
            'name' => 'required',
            'tag' => 'required',

        ], $messages);


        $sample = new sample();
        $sample->name = $request->input('name');
        $sample->tag = $request->input('tag');
        $sample->description = $request->input('description');
        $sample->link = $request->input('link');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('image/sample/', $filename);
            $sample->img = $filename;
        } else {
            return $request;
            $sample->img = '';
        }
        $sample->save();
        $msg = 'پرشد';
        return redirect('/admin/samples')->with('success', $msg);

    }

    public function show(sample $sample)
    {

    }


    public function edit(sample $sample)
    {
        return view('back.samples.edit',compact('sample'));
    }
    public function update(Request $request, sample $sample)
    {
        $messages=[
            'name.required'=>'فیلد را  پر کنید',
            'img.required'=>'فیلد را  پر کنید',

        ];
        $vlidatedDate=$request->validate([
            'name'=>'required',
            'img'=>'required',
        ],$messages);
        $sample = new sample();
        $sample->update($request->all());
        $msg='بروزرسانی با موفقیت  انجام شد ';
        return redirect('/admin/samples/create')->with('success',$msg);

    }

    public function destroy(sample $sample)
    {
        $sample->delete();
        $msg='حذف شد ';
        return redirect('/admin/samples')->with('success',$msg);
    }
}
