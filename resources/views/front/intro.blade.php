<section id="intro" class="clearfix">
    <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">
                <h2>اولین  پروژه  من <br> لاراول <span> نمونه کار </span></h2>
                <div>
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}


                </div>
            @endif
            <div class="col-md-6 intro-img order-md-last order-first">
                <img src="/front/img/intro-img.svg" alt="" class="img-fluid">
            </div>
        </div>

    </div>
</section>
