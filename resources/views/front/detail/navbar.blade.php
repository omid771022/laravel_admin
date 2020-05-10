<header id="header">
    <div id="topbar">
        <div class="container">
            <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="logo float-left">
            <!-- Uncomment below if you prefer to use an image logo -->
            <h1 class="text-light"><a href="#intro" class="scrollto"><span>Rapid</span></a></h1>
            <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
        </div>

        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="#intro">خانه </a></li>
                <li><a href="#about">درباره ما</a></li>
                <li><a href="#services">خدمات</a></li>
                <li><a href="#portfolio">نمونه کارها </a></li>
                <li><a href="#team">تیم ما</a></li>
                <li><a href="{{route('article')}}">مطالب ما  </a></li>
                <li class="drop-down"><a href="">منوی کاربری</a>
                    <ul>

                        @auth()
                            <li><a href="{{route('profile',Auth::user()->id)}}">ویرایش پروفایل</a></li>
                            @if(Auth::user()->role==1)

                                <li><a href="{{route('admin')}}">پنل مدیریت</a></li>
                                @endif()
                            <li>
                                <form  action="{{route('logout')}}"   method="post">
                                    @csrf
                                    <button class="btn btn-primary" type="submit"> خروج</button>
                                </form>
                            </li>

                            @else

                            <li><a href="{{route('register')}}">ثبت نام</a></li>
                            <li><a href="{{route('login')}}">ورود</a></li>
                            @endauth



                    </ul>
                </li>
                <li><a href="#footer">تماس  باما </a></li>
            </ul>
        </nav><!-- .main-nav -->

    </div>
</header><!-- #header -->