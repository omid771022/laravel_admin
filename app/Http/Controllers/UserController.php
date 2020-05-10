<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('front.auth.profile', compact('user'));
    }

    public function update(UserRequest $request, $user)
    {
        $vaild = $request->validated();
        $User = User::findorFail($user);
        $User->update($vaild);
        $msg = "ویرایش با موفقیت انجام شد ";
        return redirect('/')->with('success', $msg);
    }

    public function destroy($id)
    {
        //
    }
}
