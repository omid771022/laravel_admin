<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        if($request->has('search')){
            $Users = User::search($request->get('search'))->get();
        }else{
            $Users = User::get();
        }
        return view('back.users.users',compact('Users'));
    }

//    public function index()
//    {
//        $Users=User::orderBy('id','DESC')->paginate(5);
//        return view('back.users.users',compact('Users'));
//    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }



    public function edit(User $user)
    {
        return view('front.Auth.profile', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $message = [
            'name.required' => 'فیلد عنوان را پر کنید',
            'email.required' => 'فیلد عنوان را پر کنید',
            'password.confirmed' => 'رمز عبور یکسان نیست '
        ];
        if (!empty($request->password)) {
            $validatedDate = $request->validate([
                'email' => 'required',
                'name' => 'required',
                'password' => 'min:8|confirmed',
                'password_confirmation' => 'min:8'
            ], $message);
            $password = Hash::make($request->password);
            $user->password = $password;
        } else {
            $validatedDate = $request->validate([
                'email' => 'required',
                'name' => 'required'
            ], $message);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $msg = "ویرایش با موفقیت انجام شد ";
        return redirect('/')->with('success', $msg);
    }



    public function destroy($id)
    {

    }
}
