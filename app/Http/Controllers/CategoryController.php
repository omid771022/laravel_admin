<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function index()
    {
        $category=Category::orderBy('id','DESC')->paginate(5);
        return view('back.categories.categories',compact('category'));
    }


    public function create()
    {
        return view('back.categories.create');
    }


    public function store(CategoryRequest $request )
    {
    $val=$request->validated();
         Category::create([
            'name' => $val['name'],
            'slug' => $val['slug'],

        ]);

        $msg = "ویرایش با موفقیت انجام شد ";
        return redirect('/admin/categories')->with('success', $msg);

    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {
        return view('back.categories.edit',compact('category'));
    }






public function Update(CategoryRequest $request, $category){
            $Valid = $request->validated();
        $Category = User::findOrFail($category);
        $Category->update($Valid);
        return redirect()->route('admin_Categories_update');

}
    public function destroy(Category $category)
    {
        $category->delete();
        $msg='حذف شد ';
        return redirect('/admin/categories')->with('success',$msg);
    }
}
