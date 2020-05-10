@extends('back.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">مدیریت نظرات </h4>
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
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>نظرات</th>
{{--                                <th>مدیریت</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mangecomment as $manage)
                                <tr>
                                    <td>{{$manage->name}}</td>
                                    <td>{{$manage->email}}</td>
                                    <td>{{$manage->comment}}</td>
{{--                                    <td><a href="{{route('admin.comment.destroy',$manage->id)}}"><label class="badge badge-danger">حذف</label></a></td>                                </tr>--}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$mangecomment->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
