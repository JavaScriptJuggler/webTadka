<!DOCTYPE html>
<html lang="en">
@include('admin_dashboard.layouts.head')

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin_dashboard.layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin_dashboard.layouts.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('page_content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin_dashboard.layouts.footer')
                <!-- parinclutial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin_dashboard.layouts.scripts')
</body>

</html>
