@extends('admin_index')

@section('admin_content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Upload Certificates</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="qualification">Select Qualification</label>
                                <select name="qualification_id" id="qualification" class="form-control">
                                    <option value="">-- Select Qualification --</option>
                                    @foreach ($qualifications as $qualification)
                                        @php
                                            $qualificationFiles = $certificates->where('qualification_id', $qualification->id);
                                            $fileCount = $qualificationFiles->count();
                                        @endphp
                                        <option value="{{ $qualification->id }}">
                                            {{ $qualification->name }}
                                            @if($fileCount > 0)
                                                ({{ $fileCount }} file(s) uploaded)
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="certificates">Upload Certificate(s) - Multiple files allowed</label>
                                <input type="file" name="files[]" id="certificates" class="form-control" multiple accept=".pdf,.jpg,.jpeg,.png">
                                <small class="text-muted">Accepted file types: PDF, JPG, JPEG, PNG. Max file size: 2MB per file. You can select multiple files at once.</small>
                                @error('files')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" id="uploadButton">
                                    <i data-feather="upload"></i> Upload Files
                                </button>
                                <button type="button" class="btn btn-secondary mt-2" onclick="resetForm()">
                                    <i data-feather="x"></i> Clear Selection
                                </button>
                            </div>
                        </div>
                        
                        <!-- Uploaded Files List Below Input -->
                        <div class="col-lg-12 mt-4" id="uploadedFilesSection" style="display: none;">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Uploaded Files for Selected Qualification</h5>
                                </div>
                                <div class="card-body">
                                    <div id="uploadedFilesList" class="list-group">
                                        <!-- Files will be displayed here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- All Uploaded Files Table -->
                        <div class="col-lg-12 mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">All Uploaded Certificates</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Qualification</th>
                                                    <th>File Name</th>
                                                    <th>File Size</th>
                                                    <th>Uploaded Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="certificateTableBody">
                                                @if($certificates->count() > 0)
                                                    @foreach ($certificates as $certificate)
                                                        <tr id="row-{{ $certificate->id }}">
                                                            <td>{{ $certificate->qualification->name ?? 'N/A' }}</td>
                                                            <td>{{ $certificate->original_file_name ?? 'N/A' }}</td>
                                                            <td>
                                                                @php
                                                                    $filePath = storage_path('app/public/' . $certificate->files);
                                                                    $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                                                    $fileSizeKB = round($fileSize / 1024, 2);
                                                                @endphp
                                                                {{ $fileSizeKB }} KB
                                                            </td>
                                                            <td>{{ $certificate->created_at->format('M d, Y H:i') }}</td>
                                                            <td>
                                                                <a href="{{ route('student.download.certificate', ['id' => $certificate->id]) }}"
                                                                    class="btn btn-sm btn-primary text-white">
                                                                    <i data-feather="download"></i> Download
                                                                </a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="deleteFile({{ $certificate->id }})">
                                                                    <i data-feather="trash-2"></i> Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted">No certificates uploaded yet.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('contentjs')
    <script>
        // Show uploaded files when qualification is selected
        document.getElementById('qualification').addEventListener('change', function() {
            const qualificationId = this.value;
            if (qualificationId) {
                loadUploadedFiles(qualificationId);
            } else {
                document.getElementById('uploadedFilesSection').style.display = 'none';
            }
        });

        function loadUploadedFiles(qualificationId) {
            // Get files for this qualification from the table
            const tableRows = document.querySelectorAll('#certificateTableBody tr');
            const filesList = document.getElementById('uploadedFilesList');
            filesList.innerHTML = '';
            
            let hasFiles = false;
            tableRows.forEach(row => {
                const rowId = row.id;
                if (rowId && rowId.startsWith('row-')) {
                    // Check if this row belongs to the selected qualification
                    // We'll need to store qualification_id in a data attribute
                    const rowQualification = row.querySelector('td:first-child')?.textContent.trim();
                    // For now, we'll show all files and filter by checking the table
                }
            });
            
            // Fetch files via AJAX or filter from existing table
            fetch(`/qualification/${qualificationId}/files`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.files && data.files.length > 0) {
                    filesList.innerHTML = '';
                    data.files.forEach(file => {
                        const fileItem = document.createElement('div');
                        fileItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                        fileItem.innerHTML = `
                            <div>
                                <i data-feather="file"></i> 
                                <strong>${file.original_file_name}</strong>
                                <small class="text-muted ml-2">(${file.file_size} KB)</small>
                                <br>
                                <small class="text-muted">Uploaded: ${new Date(file.created_at).toLocaleString()}</small>
                            </div>
                            <div>
                                <a href="/download/certificate/${file.id}" class="btn btn-sm btn-primary mr-2">
                                    <i data-feather="download"></i> Download
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="deleteFile(${file.id})">
                                    <i data-feather="trash-2"></i> Delete
                                </button>
                            </div>
                        `;
                        filesList.appendChild(fileItem);
                    });
                    document.getElementById('uploadedFilesSection').style.display = 'block';
                    feather.replace();
                } else {
                    document.getElementById('uploadedFilesSection').style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error loading files:', error);
                // Fallback: hide the section if there's an error
                document.getElementById('uploadedFilesSection').style.display = 'none';
            });
        }

        function resetForm() {
            document.getElementById('qualification').value = '';
            document.getElementById('certificates').value = '';
            document.getElementById('uploadedFilesSection').style.display = 'none';
        }

        function uploadCertificates() {
            const qualificationId = document.getElementById('qualification').value;
            const fileInput = document.getElementById('certificates');
            const files = fileInput.files;

            if (!qualificationId) {
                toastr.warning('Please select a qualification.');
                return;
            }

            if (files.length === 0) {
                toastr.warning('Please select at least one file to upload.');
                return;
            }

            // Validate file sizes and types
            let validFiles = [];
            let invalidFiles = [];
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const maxSize = 2 * 1024 * 1024; // 2MB
                const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                
                if (file.size > maxSize) {
                    invalidFiles.push(file.name + ' (exceeds 2MB)');
                    continue;
                }
                
                if (!allowedTypes.includes(file.type)) {
                    invalidFiles.push(file.name + ' (invalid file type)');
                    continue;
                }
                
                validFiles.push(file);
            }

            if (validFiles.length === 0) {
                toastr.error('No valid files to upload. Please check file types and sizes.');
                return;
            }

            if (invalidFiles.length > 0) {
                toastr.warning('Some files were skipped: ' + invalidFiles.join(', '));
            }

            const formData = new FormData();
            formData.append('qualification_id', qualificationId);
            validFiles.forEach(file => {
                formData.append('files[]', file);
            });
            formData.append('_token', '{{ csrf_token() }}');

            // Disable upload button during upload
            const uploadBtn = document.getElementById('uploadButton');
            uploadBtn.disabled = true;
            uploadBtn.innerHTML = '<i data-feather="loader"></i> Uploading...';
            feather.replace();

            fetch('{{ route('student.upload.certificate') }}', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success(data.message);
                        
                        // Add new files to the table
                        if (data.certificates && data.certificates.length > 0) {
                            const tableBody = document.getElementById('certificateTableBody');
                            
                            // Remove "No certificates" message if exists
                            const noDataRow = tableBody.querySelector('tr td[colspan]');
                            if (noDataRow) {
                                noDataRow.closest('tr').remove();
                            }
                            
                            data.certificates.forEach(cert => {
                                const date = new Date(cert.created_at).toLocaleString('en-US', { 
                                    month: 'short', 
                                    day: 'numeric', 
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });
                                const row = document.createElement('tr');
                                row.id = `row-${cert.id}`;
                                row.innerHTML = `
                                    <td>${cert.qualification.name}</td>
                                    <td>${cert.original_file_name || 'N/A'}</td>
                                    <td>-</td>
                                    <td>${date}</td>
                                    <td>
                                        <a href="/download/certificate/${cert.id}" class="btn btn-sm btn-primary text-white">
                                            <i data-feather="download"></i> Download
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="deleteFile(${cert.id})">
                                            <i data-feather="trash-2"></i> Delete
                                        </button>
                                    </td>
                                `;
                                tableBody.appendChild(row);
                            });
                            feather.replace();
                        }
                        
                        // Reload uploaded files for selected qualification
                        loadUploadedFiles(qualificationId);
                        
                        // Reset form
                        fileInput.value = '';
                    } else {
                        toastr.error('Error: ' + (data.message || 'Upload failed'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('An error occurred while uploading the files.');
                })
                .finally(() => {
                    uploadBtn.disabled = false;
                    uploadBtn.innerHTML = '<i data-feather="upload"></i> Upload Files';
                    feather.replace();
                });
        }

        document.getElementById('uploadButton').addEventListener('click', uploadCertificates);

        function deleteFile(certificateId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/delete/certificate/${certificateId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => response.text())
                    .then(data => {
                        try {
                            const jsonData = JSON.parse(data);
                            if (jsonData.success) {
                                document.getElementById(`row-${certificateId}`).remove();
                                
                                // Check if table is empty
                                const tableBody = document.getElementById('certificateTableBody');
                                if (tableBody.children.length === 0) {
                                    tableBody.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No certificates uploaded yet.</td></tr>';
                                }
                                
                                // Reload uploaded files if qualification is selected
                                const qualificationId = document.getElementById('qualification').value;
                                if (qualificationId) {
                                    loadUploadedFiles(qualificationId);
                                }
                                
                                toastr.success('File deleted successfully!');
                            } else {
                                toastr.error('Error deleting file: ' + (jsonData.message || 'Unknown error'));
                            }
                        } catch (e) {
                            console.error('Error parsing response:', e);
                            toastr.error('Error deleting file');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastr.error('An error occurred while deleting the file.');
                    });
                }
            });
        }

        // File input validation
        document.getElementById('certificates').addEventListener('change', function() {
            const files = this.files;
            const maxSize = 2 * 1024 * 1024; // 2MB
            const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                if (!allowedTypes.includes(file.type)) {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid File Type",
                        text: `${file.name} is not a valid file type. Accepted types: PDF, JPG, JPEG, PNG.`,
                    });
                    this.value = '';
                    return;
                }
                
                if (file.size > maxSize) {
                    Swal.fire({
                        icon: "error",
                        title: "File Too Large",
                        text: `${file.name} exceeds 2MB. Please choose a smaller file.`,
                    });
                    this.value = '';
                    return;
                }
            }
            
            if (files.length > 0) {
                toastr.info(`${files.length} file(s) selected and ready to upload.`);
            }
        });

        // Initialize Feather Icons on page load
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
            
            // Load files if qualification is pre-selected
            const qualificationId = document.getElementById('qualification').value;
            if (qualificationId) {
                loadUploadedFiles(qualificationId);
            }
        });
    </script>
@endsection
