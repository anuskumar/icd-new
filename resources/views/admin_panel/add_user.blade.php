@extends('admin_index')
@section('admin_content')

<div class="page-wrapper" style="background-color: #f5f0fa;">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Users</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin_panel.users')}}" method="post" enctype="multipart/form-data">
					@csrf
                    <input type="hidden" name="id" value="{{$user_data->id ?? ''}}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <h4>Personal Information</h4>
                            <br>
                            <br>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{$user_data->name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>User type</label>
                                        <select class="form-control select2-select" name="user_type">
                                            <option value="">--select--</option>
                                            <option value="staff" {{ old('user_type', $user_data->user_type ?? '') == 'staff' ? 'selected' : '' }}>Staff</option>
                                            <option value="sub_agent" {{ old('user_type', $user_data->user_type ?? '') == 'sub_agent' ? 'selected' : '' }}>Sub Agent</option>
                                        </select>
                                    </div>
                                </div>




                                {{-- <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-groupicon">
                                            <input type="text" placeholder="DD-MM-YYYY" name="birth_date" class="datetimepicker" value="{{ isset($user_data) ? \Carbon\Carbon::parse($user_data->birth_date)->format('d-m-Y') : '' }}">
                                            <div class="addonset">
                                                <img src="{{ asset('admin_assets/assets/img/icons/calendars.svg') }}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Country of Citizenship</label>
                                        <select class="form-control select2-select" name="countryId" id="countryId">
                                            <option value="">--select--</option>
                                            @foreach($country as $c)
                                                <option value="{{ $c->id }}"
                                                        @if(isset($user_data) && $user_data->country_id == $c->id)
                                                            selected
                                                        @endif>
                                                    {{ $c->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}









                                {{-- <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>	Gender </label>
                                        <select class="form-control select2-select " name="gender">
                                            <option>select</option>
                                            <option value="1" {{ old('gender', $user_data->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="0" {{ old('gender', $user_data->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="phone" name="phone_no" class="form-control select2-select " value="{{$user_data->phone_no ?? ''}}">
                                    </div>
                                </div>


                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control select2-select " value="{{$user_data->email ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        @if(isset($user_data) && $user_data->password2)
                                            <!-- Hidden input to store the password value -->
                                            <input type="hidden" name="password2" value="{{ $user_data->password2 }}">
                                            <input type="text" class="pass-input" value="********" readonly>
                                        @else
                                            <input type="text" name="password2" class="pass-input" value="">
                                        @endif
                                    </div>
                                </div>



                                </div>


                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                                    <a href="{{ route('admin_panel.userlist') }}" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

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
        newFileInput.name = 'files[]';  // Ensure this input is part of the 'files[]' array
        newFileInput.multiple = true;   // Allow multiple file selections
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
