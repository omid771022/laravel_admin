@extends('back.admin')
@section('content')
    <div class="content-wrapper">

        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">مدیریت دسته بندی ها </h4>
                </div>
            </div>

        </div>
        <div class="row">
            <a href="{{route('admin.articles.create')}}" class="btn btn-success">ایجاد دسته جدید</a>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>slug-نام مستعار</th>
                                <th>نام</th>
                                <th>نویسنده</th>
                                <th>دسته بندی</th>
                                <th>وضیعت</th>
                                <td>مدیریت </td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->name}}</td>
                                    <td>{{$article->slug}}</td>
                                    <td>{{$article->user->name}}</td>
                                    
                                    </td>
                                    @if($article->status==1)

                                        @php

                                            $url = route('admin_article_status',$article->id);
                                            $status='<a href="'.$url.'" class="badge badge-success">معمولی</a>';
                                        @endphp
                                    @else
                                        @php
                                            $url = route('admin_article_status',$article->id);
                                                  $status='<a href="'.$url.'" class="badge badge-danger">غیر فعال</a>';
                                        @endphp
                                    @endif
                                     <td>{!!$status!!}</td>

                                    <td><a href="{{route('admin_articles_edit',$article->id)}}"><label class="badge badge-success">ویرایش</label></a></td>
                                    <td><a href="{{route('admin.articles.destroy',$article->id)}}"><label class="badge badge-danger">حذف</label></a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
