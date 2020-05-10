@extends('front.main')
@section('content')
    <br>
    <br>
    <main class="container main2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="d-flex justify-content-center">

                        <form action="{{route('profileupdate',$user->id)}}" method="post"  >
                            @csrf
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی </label>
                                <input type="text" class="form-group form-control  @error('name') is-invalid @enderror "   name="name" value="{{$user->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label >ایمیل</label>
                                <input type="email" class="form-group form-control @error('password') is-invalid @enderror" name="email" value="{{$user->email}}">
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
                                <label >رمز عبور  تکرار</label>
                                <input type="password" class="form-group form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" >
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">ویرایش پروفایل </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection