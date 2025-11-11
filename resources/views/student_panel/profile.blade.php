@extends('admin_index')
@section('admin_content')
    <div class="page-wrapper" style="background-color: #f5f0fa;">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>students</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_panel.students') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $student_data->id ?? '' }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4>Personal Information 👨‍🎓</h4>
                                    <br>
                                    <br>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>First Name ✏️</label>
                                            <input type="text" name="first_name"
                                                value="{{ $student_data->first_name ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name✏️</label>
                                            <input type="text" name="last_name"
                                                value="{{ $student_data->last_name ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Date of Birth📅</label>
                                            <div class="input-groupicon">
                                                <input type="text" placeholder="DD-MM-YYYY" name="birth_date"
                                                    class="datetimepicker"
                                                    value="{{ isset($student_data) ? \Carbon\Carbon::parse($student_data->birth_date)->format('d-m-Y') : '' }}">
                                                <div class="addonset">
                                                    <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Country of Citizenship🌎</label>
                                            <select class="form-control select2-select" name="countryId" id="countryId">
                                                <option value="">--select--</option>
                                                {{-- @foreach ($country as $c)
                                                    <option value="{{ $c->id }}"
                                                        @if (isset($student_data) && $student_data->country_id == $c->id) selected @endif>
                                                        {{ $c->name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Passport Number🛂</label>
                                            <input type="text" name="passport_number"
                                                value="{{ $student_data->passport_number ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Passport expiry date📅</label>
                                            <div class="input-groupicon">
                                                <input type="text" placeholder="DD-MM-YYYY" name="passport_expiry"
                                                    class="datetimepicker"
                                                    value="{{ isset($student_data) ? \Carbon\Carbon::parse($student_data->passport_expiry)->format('d-m-Y') : '' }}">
                                                <div class="addonset">
                                                    <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> Gender 🧑‍🤝‍🧑</label>
                                            <select class="form-control select2-select " name="gender">
                                                <option>select</option>
                                                <option value="0"
                                                    {{ old('gender', $student_data->gender ?? '') == 'Male' ? 'selected' : '' }}>
                                                    Male 🚹</option>
                                                <option value="1"
                                                    {{ old('gender', $student_data->gender ?? '') == 'Female' ? 'selected' : '' }}>
                                                    Female 🚺</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Email 📩</label>
                                            <input type="email" name="email" class="form-control select2-select "
                                                value="{{ $student_data->email ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number 📞</label>
                                            <input type="text" name="phone" class="form-control select2-select "
                                                value="{{ $student_data->phone ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12" id="inputContainer">
                                    <div class="form-group">
                                        <label>File Uploads</label>
                                        <div id="fileInputs">
                                            <input type="file" class="form-control file-input" name="files[]" multiple>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <button type="button" class="btn btn-sm btn-primary" id="addButton"
                                        style="font-size: 20px; padding: 2px 10px; display: block; margin:29px 0px;">+</button>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                                    {{-- <a href="{{ route('admin_panel.studentlist') }}" class="btn btn-cancel">Cancel</a> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

{{-- @section(
    if ($req->hasFile('files')) {
                foreach ($req->file('files') as $file) {
                    $filename = rand() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('uploads', $filename, 'public');

                    $studentFile = new StudentFile();
                    $studentFile->student_id = $data->id;
                    $studentFile->files = $filename;

                    $studentFile->save();
                }
            }
)
@endsection --}}

@section('contentjs')
    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            // Create a new div to contain the file input and close button
            var newDiv = document.createElement('div');
            newDiv.className = 'form-group mt-2 d-flex align-items-center';

            // Create a new file input field
            var newFileInput = document.createElement('input');
            newFileInput.type = 'file';
            newFileInput.className = 'form-control';
            newFileInput.name = 'files[]'; // Ensure this input is part of the 'files[]' array
            newFileInput.multiple = true; // Allow multiple file selections
            newDiv.appendChild(newFileInput);

            // Create a close button
            var closeButton = document.createElement('button');
            closeButton.type = 'button';
            closeButton.className = 'btn btn-danger btn-sm ml-2';
            closeButton.innerHTML = '&times;';
            closeButton.style.fontSize = '20px';
            newDiv.appendChild(closeButton);

            // Append the new div to the container
            document.getElementById('inputContainer').appendChild(newDiv);

            // Add event listener to remove the file input and close button when clicked
            closeButton.addEventListener('click', function() {
                newDiv.remove();
            });
        });
    </script>
@endsection
