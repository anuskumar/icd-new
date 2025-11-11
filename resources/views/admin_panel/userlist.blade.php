@extends('admin_index')
@section('admin_content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User List</h4>
                {{-- <h6>Manage your products</h6> --}}
            </div>
            <div class="btn-group">
                <a href="{{ route('admin_panel.users') }}" class="btn btn-added" aria-expanded="false">
                    <img src="{{ asset('admin_assets/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add
                </a>


            </div>

        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">

                <!-- /Filter -->

                <div class="table-responsive">
                    <table class="table  datanew dataTable">
                        <thead>
                            <tr>

                                <th>Sl No</th>
                                <th>Name</th>

                                {{-- <th>Gender</th> --}}
                                {{-- <th>Birth Date</th> --}}
                                {{-- <th>Brochure</th> --}}
                                {{-- <th>City of Citizenship</th> --}}
                                <th>User Type</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>


@endsection

@section('contentjs')
    <script type="text/javascript">
    $(document).ready( function () {
        $('.dataTable').dataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: "{{route('admin_panel.get-userlist')}}",
        columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    // {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'user_type', name: 'user_type'},
                    {data: 'phone_no', name: 'phone_no'},
                    // {data: 'last_name', name: 'last_name'},

                    // {data: 'gender', name: 'gender'},
                    // {data: 'birth_date', name: 'birth_date'},
                    // {data: 'country_id', name: 'country_id'},
                    {data: 'email', name: 'email'},
                    {data: 'password2', name: 'password2'},

                    {data: 'action', name: 'action', orderable: true, searchable: true}

                ]
        });
    });
    </script>
@endsection
