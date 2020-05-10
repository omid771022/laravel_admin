@extends('back.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">پنل مدیریت</h4>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('profileupdat',$user->id)}}" method="post"  >
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
                                <a href="{{route('adminusers')}}" class="btn btn-success">برگشت </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
