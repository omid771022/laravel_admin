@extends('back.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">مدیریت نمونه  کار ها  </h4>
                </div>
            </div>

        </div>
        <div class="row">
            <a href="{{route('admin.sample.create')}}" class="btn btn-success">انمونه کار جدید </a>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>نام </th>
                                <th>نام تگ</th>
                                <th>لینک </th>
                                <th>توضیحات </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($samples as $sample)
                                <tr>
                                    <td>{{$sample->name}}</td>
                                    <td>{{$sample->tag}}</td>
                                    <td>{{$sample->link}}</td>
                                    <td>{{$sample->description}}</td>
                                    <td><a href="{{route('admin_sample_edit', $sample->id)}}"><label class="badge badge-success">ویرایش</label></a></td>
                                    <td><a href="{{route('admin.sample.destroy', $sample->id)}}"><label class="badge badge-danger">حذف</label></a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{$samples->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection

