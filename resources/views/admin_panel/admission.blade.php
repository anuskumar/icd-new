@extends('admin_index')
@section('admin_content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Admission List</h4>
                {{-- <h6>Manage your products</h6> --}}
            </div>
            <div class="page-btn">
                <a href="{{ route('admin_panel.manage-admission') }}" class="btn btn-added"><img src="{{ asset('admin_assets/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add</a>
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
                                <th>Category</th>
                                <th>College</th>
                                <th>Course</th>
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
    $(document).ready( function () {
        $('.dataTable').dataTable({
        processing: true,
        serverSide: true,
        destroy: true,
        ajax: "{{route('admin_panel.get-admission')}}",
        columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {data: 'category_id', name: 'category_id'},
                    {data: 'college_id', name: 'college_id'},
                    {data: 'course_id', name: 'course_id'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: true, searchable: true}

                ]
        });
    });
    </script>
@endsection
