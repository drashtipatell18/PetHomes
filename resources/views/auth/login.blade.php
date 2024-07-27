@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-w-h">
            <h1>Login</h1>

            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                        <span class="login100-form-title p-b-43">
                            Login
                        </span>
                        @csrf

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Email</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Password</span>
                        </div>

                        <div class="flex-sb-m w-full p-t-3 p-b-32">
                            <div class="contact100-form-checkbox">

                            </div>

                            <div>
                                <a href="{{ route('forget.password') }}" class="txt1">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>


                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>

                    </form>

                    <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
                    </div>
                </div>

                <div class="label-float">
                    <input type='password' id='password' placeholder=' ' required>
                    <label for='password'>Password</label>
                </div>

                <button class="button">Login</button>

                <hr class="hr">

                <p>
                    <a href="#">Forgot Password?</a>
                </p>
            </div>
        </div>
    @endsection
