<!DOCTYPE html>
<html lang="en">

@include('frontend.head')

<body>
    <!-- ======= Header ======= -->
    @include('frontend.header')
    <!-- End Header -->
    @yield('body')
    <!-- ======= Footer ======= -->
    @include('frontend.footer')
    <!-- End Footer -->

   @yield('go-to-top')
    <div id="preloader"></div>

    @include('frontend.scripts')
</body>

</html>
