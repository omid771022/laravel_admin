@extends('back.admin');
@section('content')

    <form action="{{route('admin_articles_update',$articles->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">نام </label>
            <input type="text" class="form-group form-control  @error('name') is-invalid @enderror " name="name"  value="{{$articles->name}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label >slug</label>
            <input type="text" class="form-group form-control @error('slug') is-invalid @enderror" name="slug" value="{{$articles->slug}}">
            @error('slug')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>وضیعت</label>
            <select class="form-group form-control " name="status">
                <option value="0"  <?php   if ($articles->status===0) echo 'selected'   ?>           >منتشر نشده</option>
                <option value="1"  <?php   if ($articles->status===1) echo 'selected'   ?>>منتشر شده</option>
            </select>
        </div>
        <div class="form-group">

            <div class="form-check">
                @foreach($categories as $cat_name=>$cat_id)
                    <label class="form-check-inline">
                        <input type="checkbox" class="form-group" name="categories[]" value="{{$cat_name}}">

                        {{$cat_id}}
                    </label>
                @endforeach
            </div>
        </div>




        <div class="form-group">
            <button  class="btn btn-success">ثبت مقاله  </button>
        </div>
    </form>
@endsection
