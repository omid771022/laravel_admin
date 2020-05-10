<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsesrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
