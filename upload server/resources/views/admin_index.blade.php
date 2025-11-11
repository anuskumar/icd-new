<!DOCTYPE html>
<html lang="en">
@include('admin_layout.header')
@guest

    <body class="account-page">
        @yield('login_content')
        @include('admin_layout.footer_js')


    </body>

    @if (!auth()->check() && !request()->is('login'))
    <script>
        window.location.href = "{{ route('admin_panel.showLoginForm') }}";
    </script>
    @endif
@endguest

@auth



    <body>

        <div id="global-loader">
            <div class="whirly-loader"></div>
        </div>
        <!-- Main Wrapper -->
        <div class="main-wrapper">
            @include('admin_layout.topheader')
            @include('admin_layout.sidebar')
            @yield('admin_content')
        </div>
        <!-- /Main Wrapper -->
        @include('admin_layout.admin_footer_js')

        <!-- DataTables CSS and JS via CDN -->
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script> --}}

        @include('admin_layout.popupmodal')

        <!-- Delete Model -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Box</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <span><img src="{{ asset('admin_assets/assets/img/icons/delete.svg') }}" alt="img"></span>
                        <h4 class="text-danger tx-semibold">Are you sure want to delete?</h4>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-danger" id="conf_true">Yes, delete it!</a>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->

        <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if(session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if(session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                // Initialize DataTable
                $('#your-data-table-id').DataTable();
            });

            function delete_confirm(path) {
                var url = "{{ url('') }}";
                var fullurl = url + path;
                // alert(fullurl);
                $("#conf_true").attr("href", fullurl);
            }
        </script>

        @yield('contentjs')
    </body>
@endauth

</html>
