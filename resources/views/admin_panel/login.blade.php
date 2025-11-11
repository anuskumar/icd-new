@extends('admin_index')
@section('login_content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo logo-normal">
                            <i class="fas fa-graduation-cap fa-3x text-primary"></i>
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <form method="POST" action="{{ route('admin_panel.login') }}">
                            @csrf
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" name="email" placeholder="Enter your email address"
                                        value="{{ old('email') }}">
                                    <img src="{{ asset('admin_assets/assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                            </div>
                            @error('email')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
                                </div>
                            </div>
                            <div class="form-login">
                                <input type="submit" class="btn btn-login" value="Sign In">
                            </div>
                        </form>
                    </div>

                </div>
                <div class="login-img">
                    <img src="{{ asset('admin_assets/assets/img/study-abroad-concept.avif') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
@endsection
