@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Student List</h4>

                </div>
                <div style="display: flex; gap: 10px;">
                    <div>
                        <a href="{{ route('admin_panel.students') }}" class="btn btn-added" aria-expanded="false">
                            <img src="{{ asset('admin_assets/assets/img/icons/plus.svg') }}" alt="Add Student"
                                class="me-1">Add
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('admin_panel.student-import') }}" class="btn btn-added" aria-expanded="false">
                            <img src="{{ asset('admin_assets/assets/img/icons/plus.svg') }}" alt="Import Excel"
                                class="me-1">Import Excel
                        </a>
                    </div>
                </div>

            </div>



            <div class="card">
                <div class="card-body">

                    <!-- /Filter -->

                    <div class="table-responsive">
                        <table class="table  datanew dataTable">
                            <thead>
                                <tr>

                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Birth Date</th>
                                    <th>City of Citizenship</th>
                                    <th>Passport Number</th>
                                    <th>Passport expiry date</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
        $(document).ready(function() {
            $('.dataTable').dataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "{{ route('admin_panel.get-studentlist') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    // {data: 'image', name: 'image'},
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    // {data: 'last_name', name: 'last_name'},
                    {
                        data: 'birth_date',
                        name: 'birth_date'
                    },
                    {
                        data: 'country_id',
                        name: 'country_id'
                    },
                    {
                        data: 'passport_number',
                        name: 'passport_number'
                    },
                    {
                        data: 'passport_expiry',
                        name: 'passport_expiry'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    }

                ]
            });
        });
    </script>
@endsection
