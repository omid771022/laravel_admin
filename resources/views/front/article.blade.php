@extends('front.main')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    </div>
    </div>

{{--    <form method="GET" action="{{ url('index') }}">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-6">--}}
{{--                <input type="text" name="search" class="form-control" placeholder="Search">--}}
{{--            </div>--}}
{{--            <div class="col-md-6">--}}
{{--                <button class="btn btn-info">Search</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}



    <div class="container">
        <div class="row">
            <div class="col col-lg-12">

                    <div class="container">
                        <form method="GET" action="{{ url('/articles') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="search" class="form-control" placeholder="Search">
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-info">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>




        <main class="container main2">
        <br>
            <div class="row">
                    @foreach($articles as $article)
                        <div class="col-sm-3 col-lg-4">
                            <div class="card">
                                <img src="{{asset('image/article/'. $article->img)}}" class="card-img-top"/>
                                <div class="card-body">
                                    <h5 class="card-title">{{$article->name}}</h5>
                                    <ul class="ul-artclie">
                                        <li>تاریخ:{!! jdate($article->created_at)->format('%d-%B-%Y'); !!}</li>
                                        <li>نویسنده{{$article->user->name}}</li>
                                        <li>بازدید:{{$article->hit}}</li>
                                    </ul>

                                    <p class="card-text"><?php echo mb_substr(strip_tags($article->description), 0, 100), '..' ?></p>
                                    <a href="{{route('show_article',$article->id)}}" class="btn btn-primary"> دیدن مطالب</a>
                                </div>
                            </div>
                        </div>
                    @endforeach()
            </div>
            <div>
            </div>
        </div>
    </main>
@endsection
