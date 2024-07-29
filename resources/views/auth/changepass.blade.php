@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card card-w-h">
            <form action="{{ route('changePassword') }}" method="POST">
                <span class="login100-form-title p-b-43">
                    Change Password
                </span>
                @csrf

                <div class="label-float">
                    <input name="current_password" type='password' id='current_password' placeholder="">
                    <label for='current_password'>Current Password</label>

                    @error('current_password')
                        <div class="text-danger" style="font-size: small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="label-float">
                    <input name="new_password" type='password' id='new_password' placeholder="">
                    <label for='new_password'>New Password</label>

                    @error('new_password')
                        <div class="text-danger" style="font-size: small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="label-float">
                    <input name="confirm_password" type='password' id='confirm_password' placeholder="">
                    <label for='confirm_password'>Confirm Password</label>

                    @error('confirm_password')
                        <div class="text-danger" style="font-size: small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Change Password
                    </button>
                </div>
                <hr class="hr">

            </form>
        </div>
    </div>
    </div>
@endsection
