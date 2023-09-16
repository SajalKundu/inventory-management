<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/gritter/js/jquery.gritter.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

<script language="JavaScript">
    function status(location) {
        if (confirm("Are you sure to Change status for this entry?") == 1)
            document.location = location;
    }

    function hstatus(location) {
        if (confirm("Are you sure to Change Home status for this entry?") == 1)
            document.location = location;
    }

    function del(location) {
        if (confirm("Are you sure to delete the entry?") == 1)
            document.location = location;
    }
</script>
@if (Session::has('msg'))
    <script>
        $(document).ready(function() {
            $.gritter.add({
                title: 'Success!',
                text: '{{ ucwords(session('msg')) }}<br>Please click X to dismiss this notification.',
                class_name: "gritter-success",

            });
        });
    </script>
@endif

@if (Session::has('emsg'))
    <script>
        $(document).ready(function() {
            $.gritter.add({
                title: 'Error!',
                text: '{{ ucwords(session('emsg')) }}<br>Please click X to dismiss this notification.',
                class_name: "gritter-danger",
            });
        });
    </script>
@endif
@yield('additional_admin_js')
