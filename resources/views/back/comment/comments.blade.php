@extends('back.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">مدیریت دسته بندی ها </h4>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>خلاصه نظر</th>
                                <th>نویسنده نظر</th>
                                <th>براای مطلبه</th>
                                <th>وضیعت</th>
                                <td>مدیریت</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->body}}</td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->article_id}}</td>
                                    @if($comment->status==1)
                                        @php
                                            $url = route('admin_comments_status',$comment->id);
                                            $status='<a href="'.$url.'" class="badge badge-success">معمولی</a>';
                                        @endphp
                                    @else
                                        @php

                                            $url = route('admin_comments_status',$comment->id);
                                                  $status='<a href="'.$url.'" class="badge badge-danger">غیر فعال</a>';
                                        @endphp
                                    @endif
                                    <td>{!!$status!!}</td>
                                    <td><a href="{{route('admin_comments_edit',$comment->id)}}"><label class="badge badge-success">ویرایش</label></a></td>
                                    <td><a href="{{route('admin.comments.destroy',$comment->id)}}"><label class="badge badge-danger">حذف</label></a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$comments->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection

