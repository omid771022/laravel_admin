
@extends('front.main')
@section('content')
    <br>
    <br>
    <main class="container main2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
<div class="d-flex justify-content-center">
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="form-group">
            <label >ایمیل</label>
            <input type="email" class="form-group form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="form-group">
            <label >رمز عبور </label>
            <input type="password" class="form-group form-control @error('password') is-invalid @enderror" name="password" >
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label >مرا بخاطر بسپار  </label>
            <input type="checkbox" class="form-group " name="remember" >

        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-success">ورود</button>
        </div>


        <a href="login/google" class="btn btn-danger"> Login with Google</a>
    </form>
</div>
                </div>
            </div>
        </div>

        </div>
    </main>
@endsection