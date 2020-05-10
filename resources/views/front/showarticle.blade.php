@extends('front.main')
@section('content')
    <br>
    <br>
    <main class="container main2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                            <h3 class="text-left">{{$articles->name}}</h3>
                            <img src="{{asset('image/article/'. $articles->img)}}" class="img-fluid">
                            <p class="text-left">{{$articles->description}}</p>
                    </div>
                </div>
            </div>
            <hr>
            <form action="{{route('admin_comment_store',$articles->id)}}" class="form-group" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">نام</label>
                        <input type="text"  class="form-group form-control" name="name">
                    </div>
                    <div class=" col-md-6">
                        <label for="name">ایمیل</label>
                        <input type="email" class="form-group form-control" name="email">

                    </div>
          <div class="col-12">
                    <div class="form-group">
                        <label for="body">نظر شما </label>
                        <textarea name="body" class="form-group form-control" cols="30" rows="10"></textarea>
                    </div>
          </div>
                </div>
                <button class="btn btn-primary" type="submit">ارسال نظر</button>
            </form>

            <h4> نمایش نظرات </h4>

            <div class="main-panel">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
            @endif()
            </div>


            <div class="card">

                @foreach($comments as $comment)
                    <div class="display-comment">
                        <div class="card" style="margin: 10px  12px ; background: #9F9EA3">
                            <strong> نام:{{$comment->name}}</strong>
                            <p>
                                نظر:
                                <br>
                                {{ $comment->body }}</p>
                        </div>
                    </div>
                @endforeach()
            </div>
            {{$comments->links()}}
        </div>
    </main>
@endsection
