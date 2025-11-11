@extends('admin_index')

@section('admin_content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Enrollment Details</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datanew dataTable">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Student Name</th>
                                    <th>Enrolled College</th>
                                    <th>Enrolled Course</th>
                                    <th>Enrolled Date & Time</th>
                                    @if (Auth::user()->user_type === 'A')
                                        <th>Email</th>
                                        <th>Requests</th>
                                        <th>Documents</th>
                                        <th>Status</th>
                                    @else
                                        <th>Message</th>
                                        <th>Documents</th>
                                        <th>Upload Confirmation</th>
                                        <th>Status</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrollDetails as $index => $enrollmentDetails)
                                    <tr id="enrollment-row-{{ $enrollmentDetails->id }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $enrollmentDetails->user->name ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($enrollmentDetails->college->name ?? 'N/A', 25) }}</td>
                                        <td>{{ Str::limit($enrollmentDetails->course->name ?? 'N/A', 20) }}</td>
                                        <td>{{ $enrollmentDetails->created_at }}</td>
                                        @if (Auth::user()->user_type === 'A')
                                            <td>{{ $enrollmentDetails->user->email ?? 'N/A' }}</td>

                                            <!-- Request Button Logic -->
                                            <td>
                                                @if ($enrollmentDetails->message && $enrollmentDetails->file_upload_status == 'confirmed')
                                                    <!-- Change the button to reflect confirmation -->
                                                    <button class="btn btn-success btn-sm" disabled>File Uploaded</button>

                                                    {{-- <button class="btn btn-danger btn-sm request-btn"
                                                        data-id="{{ $enrollmentDetails->id }}" data-toggle="modal"
                                                        data-target="#requestModal">
                                                        Confirm Msg
                                                    </button> --}}

                                                @elseif ($enrollmentDetails->message)
                                                    <!-- If request is sent but file is not confirmed yet -->
                                                    <button class="btn btn-secondary btn-sm" disabled>Requested</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm request-btn"
                                                        data-id="{{ $enrollmentDetails->id }}" data-toggle="modal"
                                                        data-target="#requestModal">
                                                        Request
                                                    </button>
                                                @endif
                                            </td>

                                            <td><a href="{{ route('admin.documents', ['student_id' => @$enrollmentDetails->student->id]) }}"
                                                    class="btn btn-success btn-sm">Verify</a></td>

                                            <!-- Status Dropdown -->
                                            <td>
                                                <select class="form-control status-dropdown"
                                                    data-id="{{ $enrollmentDetails->id }}">
                                                    <option value="">--Select--</option>
                                                    <option value="pending"
                                                        {{ $enrollmentDetails->status == 'pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="under_review"
                                                        {{ $enrollmentDetails->status == 'under_review' ? 'selected' : '' }}>
                                                        Under Review</option>
                                                    <option value="verified"
                                                        {{ $enrollmentDetails->status == 'verified' ? 'selected' : '' }}>
                                                        Verified</option>
                                                    <option class="text-green" value="completed"
                                                        {{ $enrollmentDetails->status == 'completed' ? 'selected' : '' }}>
                                                        Completed</option>
                                                    <option class="text-red" value="rejected"
                                                        {{ $enrollmentDetails->status == 'rejected' ? 'selected' : '' }}>
                                                        Rejected</option>
                                                </select>
                                            </td>
                                        @else
                                            <!-- Student Dashboard -->
                                            <td
                                                style="max-width:auto; word-wrap:break-word; overflow-wrap:break-word; white-space:normal;">
                                                {{ $enrollmentDetails->message ?? 'No messages' }}
                                            </td>
                                            <td>
                                                @if ($enrollmentDetails->file_upload_status == 'confirmed')
                                                    <button class="btn btn-secondary btn-sm send-file-btn" disabled>Send
                                                        File</button>
                                                @elseif ($enrollmentDetails->message)
                                                    <a href="{{ route('student.certificates') }}"><button
                                                            class="btn btn-secondary btn-sm send-file-btn">Send
                                                            File</button>
                                                    </a>
                                                @else
                                                    <button class="btn btn-secondary btn-sm send-file-btn" disabled>Send
                                                        File</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($enrollmentDetails->message)
                                                    <div class="form-check">
                                                        <input class="form-check-input confirm-checkbox" type="checkbox"
                                                            name="file_upload_status" value="confirmed"
                                                            {{ $enrollmentDetails->file_upload_status === 'confirmed' ? 'checked' : '' }}
                                                            @if ($enrollmentDetails->file_upload_status) disabled @endif
                                                            data-enrollment-id="{{ $enrollmentDetails->id }}">

                                                        <label class="form-check-label">
                                                            Confirm Upload
                                                        </label>
                                                    </div>
                                                @else
                                                    <span>N/A</span>
                                                @endif
                                            </td>
                                            <td class="{{ $enrollmentDetails->status === 'completed' ? 'text-success' : ($enrollmentDetails->status === 'rejected' ? 'text-danger' : 'text-primary') }}">
                                                {{ ucfirst($enrollmentDetails->status) }}
                                            </td>

                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Modal -->
    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestModalLabel">Enter Request Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="requestForm">
                        @csrf
                        <div class="form-group">
                            <label for="requestMessage">Message</label>
                            <textarea class="form-control" id="requestMessage" name="message" rows="4"
                                placeholder="Enter your request message here..."></textarea>
                        </div>
                        <input type="hidden" id="enrollmentId" name="enrollment_id" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contentjs')
    <script>
        // Handle the request button click to show the modal
        $('.request-btn').click(function() {
            let selectedEnrollmentId = $(this).data('id');
            $('#enrollmentId').val(selectedEnrollmentId);
        });

        // AJAX submission for sending request
        $('#requestForm').submit(function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            let $sendRequestButton = $('#requestForm .btn-primary'); // Select the send request button

            // Disable the button
            $sendRequestButton.prop('disabled', true).text('Sending...');

            $.ajax({
                type: 'POST',
                url: '{{ route('enrollment.sendRequest') }}',
                data: formData,
                success: function(response) {
                    $('#requestModal').modal('hide');
                    toastr.success('Request sent successfully!');
                    let enrollmentId = $('#enrollmentId').val();
                    $('#enrollment-row-' + enrollmentId + ' .request-btn')
                        .attr('disabled', true)
                        .text('Requested');
                },
                error: function(xhr) {
                    toastr.error('Error: ' + xhr.responseJSON.message);
                    // Re-enable the button if there's an error
                    $sendRequestButton.prop('disabled', false).text('Send Request');
                }
            });
        });

        // Handle file upload confirmation (student side)
        $('.confirm-checkbox').change(function() {
            let $checkbox = $(this);
            let enrollmentId = $checkbox.data(
                'enrollment-id'); // Assuming data-enrollment-id is present on the checkbox

            // Check if the checkbox is being checked for confirmation
            if ($checkbox.is(':checked')) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('student.confirmUpload', ':enrollmentId') }}'.replace(':enrollmentId',
                        enrollmentId),
                    data: {
                        file_upload_status: 'confirmed',
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $checkbox.prop('disabled', true);


                        $('#enrollment-row-' + enrollmentId + ' .send-file-btn')
                            .prop('disabled', true)
                            .text('File Sent');
                    },
                    error: function(xhr) {
                        toastr.error('Error: ' + xhr.responseJSON.message);
                        $checkbox.prop('checked', false);
                    }
                });
            }
        });

        $('.status-dropdown').change(function() {
            let enrollmentId = $(this).data('id');
            let newStatus = $(this).val();
            if (newStatus) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('enrollment.updateStatus') }}',
                    data: {
                        enrollment_id: enrollmentId,
                        status: newStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success('Status updated successfully!');
                        $('#enrollment-row-' + enrollmentId + ' .status-dropdown').val(newStatus);
                    },
                    error: function(xhr) {
                        toastr.error('Error: ' + xhr.responseJSON.message);
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            let table = $('.datanew').DataTable();

            table.destroy(); // Destroy the existing instance

            $('.datanew').DataTable({
                "order": [[4, "desc"]], // Column index 4 (Enrolled Date & Time) set to DESC
                "paging": true,
                "info": true,
                "lengthChange": true,
                "retrieve": true, // Allow reinitialization
            });
        });
    </script>
@endsection
