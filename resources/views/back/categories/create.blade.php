@extends('back.admin');
@section('content')

    <form action="{{route('admin_Categories_store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">نام </label>
            <input type="text" class="form-group form-control  @error('name') is-invalid @enderror " name="name" >
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label >slug</label>
            <input type="text" class="form-group form-control @error('slug') is-invalid @enderror" name="slug" value="">
            @error('slug')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <button  class="btn btn-success">ثبت دسته بندی </button>
        </div>
    </form>
@endsection
