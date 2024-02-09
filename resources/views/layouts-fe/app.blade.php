<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts-fe.partials.head')
</head>

<body>
  <!-- ======= Header ======= -->
  @include('layouts-fe.partials.navbar')
  <!-- End Header -->


    <main id="main">
        @yield('content-fe')
    </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts-fe.partials.footer')
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  @include('layouts-fe.partials.foot')

</body>

</html>