@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Course List</h4>
                    {{-- <h6>Manage your products</h6> --}}
                </div>
                <div class="page-btn">
                    <a href="{{ route('admin_panel.courses') }}" class="btn btn-added"><img
                            src="{{ asset('admin_assets/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add</a>
                </div>
            </div>


            <!-- /product list -->
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table  datanew dataTable">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Course Name</th>
                                    <th>Course Type</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    {{-- <th>Brochure</th> --}}
                                    {{-- <th>Fees</th> --}}
                                    <th>Status</th>
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
                ajax: "{{ route('admin_panel.get-courselist') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'course_type_id',
                        name: 'course_type.name'
                    },
                    {
                        data: 'description',
                        name: 'description',
                        render: function(data, type, row) {
                            if (type === 'display' && data.length > 50) {
                                return data.substr(0, 50) + '...';
                            }
                            return data;
                        }
                    },
                    {
                        data: 'duration',
                        name: 'duration'
                    },
                    // {
                    //     data: 'fee',
                    //     name: 'fee'
                    // },
                    {
                        data: 'status',
                        name: 'status'
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
