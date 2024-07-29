@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card card-w-h">
            <form action="{{ route('forget.password.email') }}" method="POST">
                <span class="login100-form-title p-b-43">
                    Forget Password
                </span>
                @csrf

                <div class="label-float">
                    <input name="email" type='text' id='email' placeholder="">
                    <label for='email'>Email</label>
    
                    @error('email')
                        <div class="text-danger" style="font-size: small">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Send
                    </button>
                </div>
                <hr class="hr">
            </form>
        </div>
    </div>
    </div>
@endsection
