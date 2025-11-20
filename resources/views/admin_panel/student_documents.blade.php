@extends('admin_index')

@section('admin_content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Students' Documents</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Student Dropdown -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="studentDropdown">Select Student</label>
                                <select name="student_id" id="studentDropdown" class="form-control"
                                    onchange="fetchCertificates()">
                                    <option value="">-- Select Student --</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ isset($selectedStudent) && $selectedStudent->id == $student->id ? 'selected' : '' }}>
                                            {{ $student->first_name }} {{ $student->last_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <!-- Certificates Table -->
                        <div class="col-lg-12 mt-4">
                            <h5>Uploaded Certificates</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Qualification</th>
                                        <th>File Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="certificateTableBody">
                                    <tr>
                                        <td colspan="4">Select a student to view uploaded certificates.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contentjs')
    <script>
        // Fetch certificates dynamically using jQuery for better compatibility
        function fetchCertificates() {
            const studentId = $('#studentDropdown').val();
            const tableBody = $('#certificateTableBody');

            // Clear the table if no student is selected
            if (!studentId) {
                tableBody.html('<tr><td colspan="4">Select a student to view uploaded certificates.</td></tr>');
                return;
            }

            // Show loading state
            tableBody.html('<tr><td colspan="4" class="text-center">Loading certificates...</td></tr>');

            $.ajax({
                url: '/admin/documents',
                method: 'GET',
                data: {
                    student_id: studentId
                },
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                dataType: 'json',
                success: function(data) {
                    tableBody.html(''); // Clear existing rows

                    if (data.success && data.certificates && data.certificates.length > 0) {
                        data.certificates.forEach(function(certificate) {
                            const studentName = certificate.student ? 
                                (certificate.student.first_name + ' ' + certificate.student.last_name) : 
                                'N/A';
                            const qualificationName = certificate.qualification ? 
                                certificate.qualification.name : 
                                'N/A';
                            const fileName = certificate.original_file_name || 'N/A';
                            const downloadUrl = '{{ url("/admin/download/certificate") }}/' + certificate.id;
                            
                            tableBody.append(
                                '<tr>' +
                                    '<td>' + studentName + '</td>' +
                                    '<td>' + qualificationName + '</td>' +
                                    '<td>' + fileName + '</td>' +
                                    '<td>' +
                                        '<a href="' + downloadUrl + '" class="btn btn-primary btn-sm" target="_blank" style="min-width: 100px; text-align: center;">' +
                                            '<i class="fa fa-download"></i> Download' +
                                        '</a>' +
                                    '</td>' +
                                '</tr>'
                            );
                        });
                    } else {
                        tableBody.html('<tr><td colspan="4" class="text-center">No certificates uploaded for this student.</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching certificates:', error);
                    console.error('Response:', xhr.responseText);
                    
                    // If response is HTML (not JSON), it means the AJAX request wasn't recognized
                    if (xhr.responseText && xhr.responseText.trim().startsWith('<!')) {
                        tableBody.html('<tr><td colspan="4" class="text-danger">Error: Server returned HTML instead of JSON. Please refresh the page and try again.</td></tr>');
                    } else {
                        tableBody.html('<tr><td colspan="4" class="text-danger">Failed to fetch certificates. Please try again.</td></tr>');
                    }
                }
            });
        }

        // Trigger fetchCertificates on page load if a student is already selected
        $(document).ready(function() {
            const selectedStudentId = "{{ $selectedStudent->id ?? '' }}";
            if (selectedStudentId) {
                $('#studentDropdown').val(selectedStudentId);
                fetchCertificates();
            }
        });
    </script>
@endsection
