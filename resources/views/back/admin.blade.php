<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>پروژه- ادمین</title>
  <!-- plugins:css -->
  <link rel="stylesheet" type="text/css" href="/back/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" type="text/css" href="/back/vendors/iconfonts/ionicons/css/ionicons.css">
  <link rel="stylesheet" type="text/css" href="/back/vendors/iconfonts/typicons/src/font/typicons.css">
  <link rel="stylesheet" type="text/css" href="/back/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" type="text/css" href="/back/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" type="text/css" href=/back/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" type="text/css" href="/back/vendors/css/vendor.bundle.addons.css ">
  <link rel="stylesheet" type="text/css" href="/back/css/shared/style.css">
  <link rel="stylesheet" type="text/css" href="/back/css/demo_1/style.css">
    <link rel='stylesheet' href='https://harvesthq.github.io/chosen/chosen.css'>
  <!-- End Layout styles -->
  <link rel="shortcut icon"  href="/back/images/favicon.png" />
</head>
<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    @include('back.detail.navbar')
    <div class="container-fluid page-body-wrapper">

    @include('back.detail.sidebar')

      <div class="main-panel">
        @if(session('success'))
          <div class="alert alert-success">
            {{session('success')}}


          </div>
      @endif
      @yield('content')

      @include('back.detail.footer')
      <!-- partial -->

      </div>




      <!-- main-panel ends -->

    </div>


  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/back/vendors/js/vendor.bundle.base.js"></script>
  <script src="/back/vendors/js/vendor.bundle.addons.js"></script>

  <script src="/back/js/shared/off-canvas.js"></script>
  <script src="/back/js/shared/misc.js"></script>
  <script src="/back/js/demo_1/dashboard.js"></script>
  <script src="/back/js/multiselect.js"></script>
<script type="text/javascript">
$(document).ready(function () {

        $(".chosen-select").chosen({max_selected_options: 5});
});

</script>
</body>
</html>