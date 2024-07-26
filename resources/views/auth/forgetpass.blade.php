@extends('layouts.app')

@section('content')
    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form" action="{{ route('forget.password.email') }}" method="POST">
                    <span class="login100-form-title p-b-43">
                      Forget Password
                    </span>
                    @csrf

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Send
                        </button>
                    </div>

                </form>

                <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>
@endsection
