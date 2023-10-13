<!-- BEGIN: Vendor JS-->
<script src="{{asset('/')}}app-assets/vendors/js/vendors.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<!-- BEGIN Vendor JS-->


<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/')}}app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/extensions/tether.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/extensions/shepherd.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/')}}app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<script src="{{asset('/')}}app-assets/js/scripts/forms/select/form-select2.js"></script>
<!-- END: Page JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('/')}}app-assets/js/core/app-menu.js"></script>
<script src="{{asset('/')}}app-assets/js/core/app.js"></script>
<script src="{{asset('/')}}app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!--end data table js -->
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="{{asset('/')}}app-assets/js/scripts/datatables/datatable.js"></script>
<!--data table js -->

<!-- BEGIN: Page JS-->
<script src="{{asset('/')}}app-assets/js/scripts/pages/dashboard-analytics.js"></script>
<script src="{{asset('/')}}app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
<!-- END: Page JS-->

<!-- BEGIN: Tostr js-->
<script src="{{asset('/')}}toster/js/toser.min.js"></script>
<script>
    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //toster initilaxitions
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>

<!-- Custom Script Push-->
@stack('script')

