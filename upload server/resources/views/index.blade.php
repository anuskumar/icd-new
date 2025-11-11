<!doctype html>
<html class="no-js" lang="zxx">

    @include('layouts.header')
    <body>
        {{-- <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div> --}}
        @include('layouts.topmenubar')
        @yield('content')
        @include('layouts.footer')
        @include('layouts.footer_js')
        <!-- The Modal -->
<div class="modal fade" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">



            <!-- Modal Body -->
            <div class="modal-body">
                <form  id="userForm"  class="p-4 rounded border shadow">

                    <h2 class="text-center mb-4">Register</h2>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_no">Phone Number</label>
                        <input type="tel" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" required>
                   <span class="text-danger error-phone_no"></span>
                 </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                      <span class="text-danger error-email"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="minimum 8 character" minlength="8" name="password" required>
                    <span class="text-danger error-password"></span>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="minimum 8 character" minlength="8" id="password_confirmation" name="password_confirmation" required>
                      <span class="text-danger error-password_confirmation"></span>
                    </div>

                    <button type="button" class="btn btn-primary btn-block mt-3" id="register">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        // alert("hai");
        $('#register').on('click', function(e) {
            e.preventDefault();
            $('.text-danger').empty();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('register') }}',
                method: 'POST',
                data: $('#userForm').serialize(),
                success: function(response) {
                    Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Account has been created",
                    showConfirmButton: false,
                    timer: 1500,
                    }).then(function() {
                       history.go(0)
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let message = '';
                        for (let field in errors) {
                            message += errors[field][0] + '\n';
                        }
                        $.each(errors, function(key, value) {
                        $('.error-' + key).html(value[0]);
                    });

                    }
                }
            });
        });
    });


</script>


<style>
    .modal-body {
        background-color: #f8f9fa;
        border-radius: 8px;
    }
    .form-control {
        border-radius: 4px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 4px;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    h2 {
        font-family: 'Arial', sans-serif;
        color: #333;
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@yield('contentjs')
    </body>
</html>


