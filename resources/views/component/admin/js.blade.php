<script src=" {{ asset('dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">k
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('dashboard/vendors/chart.js/Chart.min.js') }} "></script>
    <script src="{{ asset('dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }} "></script>
    <script src="{{ asset('dashboard/vendors/progressbar.js/progressbar.min.js') }} "></script>
  
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('dashboard/js/off-canvas.js') }} "></script>
    <script src="{{ asset('dashboard/js/hoverable-collapse.js') }} "></script>
    <script src="{{ asset('dashboard/js/template.js') }} "></script>
    <script src="{{ asset('dashboard/js/settings.js') }} "></script>
    <script src="{{ asset('dashboard/js/todolist.js') }} "></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('dashboard/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dashboard/js/dashboard.js') }} "></script>
    <script src="{{ asset('dashboard/js/Chart.roundedBarCharts.js') }} "></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.3/datatables.min.js"></script>

<script>
        $(document).ready(function () {
    $('#myTable').DataTable();
});
    </script>
    <!-- End custom js for this page-->