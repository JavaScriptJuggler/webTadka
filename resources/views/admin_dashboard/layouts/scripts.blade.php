<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script>
<script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
<script src="{{ asset('assets/js/HoldOn.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    function holdOn() {
        HoldOn.open({
            theme: "sk-circle",
            message: 'We are doing our work, It will take some times. Thanks for your patience ',
        });
    }

    function closeHoldOn() {
        HoldOn.close();
    }
</script>
<!-- End custom js for this page -->
