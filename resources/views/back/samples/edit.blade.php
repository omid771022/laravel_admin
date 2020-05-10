@extends('back.admin');
@section('content')

    <form action="{{route('admin_sample_update',$sample->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label for="name">نام </label>
            <input type="text" class="form-group form-control  @error('name') is-invalid @enderror " name="name"
                   value="{{$sample->name}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>tag</label>
            <input type="text" class="form-group form-control @error('tag') is-invalid @enderror" name="tag"
                   value="{{$sample->tag}}">
            @error('tag')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>link</label>
            <input type="text" class="form-group form-control @error('link') is-invalid @enderror" name="link"
                   value="{{$sample->link}}">
            @error('link')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>توضیحات</label>
            <textarea class="form-group form-control @error('link') is-invalid @enderror" name="description" cols="9"
                      rows="9">{{$sample->description}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>عکس</label>
            <input type="file" name="img" class="@error('img') is-invalid @enderror" value="{{$sample->img}}">
        </div>
        <div class="form-group">
            <button class="btn btn-success">ثبت دسته بندی</button>
        </div>
    </form>
@endsection

