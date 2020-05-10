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
            <a href="{{route('admin.Categories.create')}}" class="btn btn-success">ایجاد دسته جدید</a>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>نام دسته ها </th>
                                <th>نام دسته بندی ها</th>
                                <th>مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $cat)
                                <tr>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->slug}}</td>
                       
                                    <td><a href="{{route('admin_Categories_edit',$cat->id)}}"><label class="badge badge-success">ویرایش</label></a></td>
                                    <td><a href="{{route('admin.Categories.destroy',$cat->id)}}"><label class="badge badge-danger">حذف</label></a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
{{$category->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
