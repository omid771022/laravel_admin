@extends('back.admin');
@section('content')
    <div class="card-body">
    <form action="{{route('admin_sample_store')}}"  method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">نام </label>
            <input type="text" class="form-group form-control  @error('name') is-invalid @enderror " name="name" >
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label >tag</label>
            <input type="text" class="form-group form-control @error('tag') is-invalid @enderror" name="tag" >
            @error('tag')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror

            <div class="form-group">
                <label >link</label>
                <input type="text" class="form-group form-control @error('link') is-invalid @enderror" name="link" >
                @error('link')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label >توضیحاات</label>
                <textarea  class="form-group form-control @error('description') is-invalid @enderror" name="description" rows="9" cols="9">
                </textarea>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>عکس</label>
                <input type="file" name="img" class="@error('img') is-invalid @enderror" value="">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">ثبت دسته بندی </button>
        </div>
    </form>
    </div>
@endsection
