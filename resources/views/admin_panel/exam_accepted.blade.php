@extends('admin_index')
@section('admin_content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Exam List</h4>
                {{-- <h6>Manage your products</h6> --}}
            </div>
            <div class="page-btn">
                <a href="{{ route('admin_panel.manage-exam') }}" class="btn btn-added"><img src="{{ asset('admin_assets/assets/img/icons/plus.svg') }}" alt="img" class="me-1">Add</a>
            </div>
        </div>


        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                {{-- <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="{{ asset('admin_assets/assets/img/icons/filter.svg') }}" alt="img">
                                <span><img src="{{ asset('admin_assets/assets/img/icons/closes.svg') }}" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ asset('admin_assets/assets/img/icons/search-white.svg') }}" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ asset('admin_assets/assets/img/icons/pdf.svg') }}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ asset('admin_assets/assets/img/icons/excel.svg') }}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ asset('admin_assets/assets/img/icons/printer.svg') }}" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <!-- /Filter -->
                {{-- <div class="card mb-0" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="row">
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Product</option>
                                                <option>Macbook pro</option>
                                                <option>Orange</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Category</option>
                                                <option>Computers</option>
                                                <option>Fruits</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Choose Sub Category</option>
                                                <option>Computer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Brand</option>
                                                <option>N/D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg col-sm-6 col-12 ">
                                        <div class="form-group">
                                            <select class="select">
                                                <option>Price</option>
                                                <option>150.00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-12">
                                        <div class="form-group">
                                            <a class="btn btn-filters ms-auto"><img src="{{ asset('admin_assets/assets/img/icons/search-whites.svg') }}" alt="img"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table  datanew dataTable">
                        <thead>
                            <tr>
                                {{-- <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th> --}}
                                <th>Sl No</th>
                                <th>Exam Name</th>
                                <th>Sample Paper</th>
                                <th>Guide</th>
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
        ajax: "{{route('admin_panel.get-exam-accepted')}}",
        columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {data: 'name', name: 'name'},
                    {data: 's_paper', name: 's_paper'},
                    {data: 'guide', name: 'guide'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: true, searchable: true}

                ]
        });
    });
    </script>
@endsection
