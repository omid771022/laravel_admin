{{-- 
@extends('front.main')
@section('content')
    <br>
    <br>
    <main class="container main2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">

                        <p>برای فعال سازی حساب کاربری خوو رو دکمه زیر کلیک کنیذ تا ایمیل شما فعال گردد</p>



                        @if(session('resend'))
                        <div class="alert-success">
                            <p>فعالسازی حساب انجام  شد  </p>


                        </div>
                        @endif
                        <form method="post" action="{{route('verification.resend')}}">
                            @csrf
                            <button type="submit" class="btn btn-primary">ارسال ایمیل فعال سازی</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection --}}
