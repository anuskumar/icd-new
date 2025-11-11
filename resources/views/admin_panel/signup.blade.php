@extends('admin_index')
@section('login_content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo logo-normal">
                            <img src="{{ asset('assets/img/logo/logo.webp') }}" alt="img">
                        </div>
                        <a href="{{ route('home') }}" class="login-logo logo-white">
                            <img src="{{ asset('assets/img/logo/logo.webp') }}" alt="">
                        </a>
                        <div class="login-userheading">
                            <h3>Create an Account</h3>
                            <h4>Continue where you left off</h4>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-login">
                                <label>Full Name</label>
                                <div class="form-addons">
                                    <input type="text" name="name" placeholder="Enter your full name">
                                    <img src="{{ asset('admin_assets/assets/img/icons/users1.svg') }}" alt="img">
                                </div>

                            </div>
                           
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" name="email" placeholder="Enter your email address">
                                    <img src="{{ asset('admin_assets/assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input" placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login" value="Sign up">Sign Up</button>
                            </div>
                        </form>
                        <div class="signinform text-center">
                            <h4>Already a user? <a href="{{ route('admin_panel.login') }}" class="hover-a">Sign In</a></h4>
                        </div>

                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('admin_assets/assets/img/login.jpg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
