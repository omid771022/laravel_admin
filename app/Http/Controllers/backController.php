<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class backController extends Controller
{


public function admin(){
    return view('back.admin');
}

    public function edit(User $user)
    {
        return view('back.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $user)
    {
        $vaild = $request->validated();
        $User = User::findorFail($user);
        $User->update($vaild);

        $msg = "ویرایش با موفقیت انجام شد ";
        return redirect('admin/users')->with('success', $msg);
    }



    public function destroy(User $user)
    {
        $user->delete();
        $msg = "ویرایش با موفقیت انجام شد ";
        return redirect('/')->with('success', $msg);
    }
    public function status(User $user)
    {
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        $user->save();
        $msg = 'بروز رسانی با موفقیت انجام شد ';
        return redirect('admin/users')->with('success', $msg);
}
}

