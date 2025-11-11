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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="qualification">Select Qualification</label>
                                <select name="qualification_id" id="qualification" class="form-control">
                                    <option value="">-- Select Qualification --</option>
                                    @foreach ($qualifications as $qualification)
                                        <option value="{{ $qualification->id }}">{{ $qualification->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="certificate">Upload Certificate</label>
                                <input type="file" name="file" id="certificate" class="form-control">
                                <small class="text-muted">Accepted file types: PDF, JPG, JPEG, PNG. Max file size: 2MB.</small>
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary mt-2" id="uploadButton">Upload</button>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Qualification</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="certificateTableBody">
                                    @foreach ($certificates as $certificate)
                                        <tr id="row-{{ $certificate->id }}">
                                            <td>{{ $certificate->qualification->name }}</td>
                                            <td>
                                                <a href="{{ route('student.download.certificate', ['id' => $certificate->id]) }}"
                                                    class="btn btn-primary text-white">Download</a>
                                                <button class="btn btn-danger"
                                                    onclick="deleteFile({{ $certificate->id }})">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
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
        document.getElementById('uploadButton').addEventListener('click', function() {
            const qualificationId = document.getElementById('qualification').value;
            const fileInput = document.getElementById('certificate');
            const file = fileInput.files[0];

            if (!qualificationId || !file) {
                toastr.success('Please select a qualification and a file.');
                //   toastr.success('File uploaded successfully!');
                return;
            }

            const formData = new FormData();
            formData.append('qualification_id', qualificationId);
            formData.append('file', file);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('{{ route('student.upload.certificate') }}', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('File uploaded successfully!');
                        const tableBody = document.getElementById('certificateTableBody');
                        tableBody.innerHTML += `
                        <tr id="row-${data.certificate.id}">
                            <td>${data.certificate.qualification.name}</td>
                            <td>
                                <a href="/download/certificate/${data.certificate.id}" class="btn btn-primary text-white">Download</a>
                                <button class="btn btn-danger" onclick="deleteFile(${data.certificate.id})">Delete</button>
                            </td>
                        </tr>
                    `;
                    } else {
                        // alert('Error: ' + data.message);
                        toastr.error('Error uploading file: ' + data.message);
                    }
                })
                .catch(
                    error =>  toastr.error(error)
                );
        });

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
                                                    .then(response => response.text()) // Change to .text() to log the raw response
                                                    .then(data => {
                                                        console.log(data); // Log the raw response
                                                        return JSON.parse(data); // Parse the response as JSON
                                                    })
                                                    .then(data => {
                                                        if (data.success) {
                                                            document.getElementById(`row-${certificateId}`).remove(); // Remove the row from the table

                                                            toastr.success('File deleted successfully!');

                                                        } else {
                                                            toastr.error('Error deleting file');

                                                        }
                                                    })
                                                    .catch(error => toastr.error(error));

                                }
                                });

        }
    </script>
    <script>
        document.getElementById('certificate').addEventListener('change', function() {
            const file = this.files[0];

            if (!file) {
                // showError('No file selected.');
                 Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No file selected.",
                    });
                return;
            }

            // Allowed file types
            const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png'];
            if (!allowedTypes.includes(file.type)) {
                // showError('Invalid file type. Accepted types: PDF, JPG, JPEG, PNG.');
                  Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Invalid file type. Accepted types: PDF, JPG, JPEG, PNG.",
                    });
                this.value = ''; // Reset the input field
                return;
            }

            // Max file size (2MB)
            const maxSize = 2 * 1024 * 1024; // 2MB in bytes
            if (file.size > maxSize) {
                // showError('File size exceeds 2MB. Please choose a smaller file.');

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "File size exceeds 2MB. Please choose a smaller file!",
                    });

                this.value = ''; // Reset the input field
                return;
            }
        });

        function showError(message) {
            // alert(message); // Display alert error (can be replaced with a UI error message)
             Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: message,
                    });
            console.error(message); // Log for debugging
        }
    </script>
@endsection
