@extends('back.admin')
@section('content')
    <div class="content-wrapper">

        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">پنل مدیریت</h4>
                </div>
            </div>

        </div>
        <div class="container">

            <form method="GET" action="{{ url('/admin/users') }}">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info">Search</button>
                    </div>
                </div>
            </form>
            <br/>

<div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>وضیعت</th>
                    <th>نقش</th>
                    <th>مدیریت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Users as $user)
                    @if($user->role==2)
@php $role='کاربر';
@endphp
@else
                        @php
                        $role='مدیر'
                   @endphp
                    @endif

                    @if($user->status==1)

                      @php

                          $url = route('admin_user_status',$user->id);
                          $status='<a href="'.$url.'" class="badge badge-success">معمولی</a>';
@endphp
                        @else
                        @php
                            $url = route('admin_user_status',$user->id);
                                  $status='<a href="'.$url.'" class="badge badge-danger">غیر فعال</a>';
                                @endphp
                        @endif
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$role}}</td>
                        <td>{!!$status!!}</td>
                        <td><a href="{{route('profiler1',$user->id)}}"><label class="badge badge-success">ویرایش</label></a></td>
                        <td><a href="{{route('deleted.user',$user->id)}}"><label class="badge badge-danger">حذف</label></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
    </div>

@endsection
