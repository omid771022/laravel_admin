@extends('back.admin');
@section('content')
    <div class="card">
    <form action="{{route('admin_articles_store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">نام </label>
            <input type="text" class="form-group form-control  @error('name') is-invalid @enderror " name="name">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>slug</label>
            <input type="text" class="form-group form-control @error('slug') is-invalid @enderror" name="slug" value="">
            @error('slug')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>محتوای مطلب </label>
            <textarea type="text" class="form-group form-control @error('description') is-invalid @enderror"
                      name="description">
                {{old('description')}}
            </textarea>
            @error('description')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>نویسند :{{Auth::user()->name}}</label>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </div>
        <div class="form-group">
            <label>عکس</label>
            <input type="file" name="img" class="@error('img') is-invalid @enderror" value="">
            @error('img')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>



        <div class="form-group">
            <label>وضیعت</label>
            <select class="form-group form-control " name="status">
                <option value="0">منتشر نشده</option>
                <option value="1">منتشر شده</option>
            </select>
        </div>
        <div class="form-group">

            <div class="form-check">
                @foreach($categories as $cat_name=>$cat_id)
                    <label class="form-check-inline">
                        <input type="checkbox" class="form-group" name="categories[]" value="{{$cat_name}}">{{$cat_id}}
                    </label>
                @endforeach

            </div>
        </div>


        <div class="form-group">
            <button class="btn btn-success">ثبت دسته بندی</button>
        </div>
    </form>
    </div>
@endsection
