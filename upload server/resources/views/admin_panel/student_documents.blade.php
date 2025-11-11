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
        // Fetch certificates dynamically
        function fetchCertificates() {
            const studentId = document.getElementById('studentDropdown').value;
            const tableBody = document.getElementById('certificateTableBody');

            // Clear the table if no student is selected
            if (!studentId) {
                tableBody.innerHTML = `<tr><td colspan="4">Select a student to view uploaded certificates.</td></tr>`;
                return;
            }

            fetch(`/admin/documents?student_id=${studentId}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    tableBody.innerHTML = ''; // Clear existing rows

                    if (data.success && data.certificates.length > 0) {
                        data.certificates.forEach(certificate => {
                            tableBody.innerHTML += `
                                <tr>
                                    <td>${certificate.student.first_name} ${certificate.student.last_name}</td>
                                    <td>${certificate.qualification.name}</td>
                                    <td>${certificate.original_file_name}</td>
                                    <td>
                                        <a href="/admin/download/certificate/${certificate.id}" class="btn btn-primary text-white">Download</a>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        tableBody.innerHTML =
                            `<tr><td colspan="4">No certificates uploaded for this student.</td></tr>`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to fetch certificates. Please try again.');
                });
        }

        // Trigger fetchCertificates on page load if a student is already selected
        document.addEventListener('DOMContentLoaded', function() {
            const selectedStudentId = "{{ $selectedStudent->id ?? '' }}"; // Get selected student ID (if available)
            if (selectedStudentId) {
                document.getElementById('studentDropdown').value =
                selectedStudentId; // Set dropdown to selected student
                fetchCertificates(); // Fetch certificates for the selected student
            }
        });
    </script>
@endsection
