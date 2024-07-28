@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-w-h">
            <h1>Login</h1>
        <form action="{{ route('loginstore')}}" method="POST">
            @csrf
            <div class="label-float">
                <input name="email" type='text' id='username' placeholder="">
                <label for='username'>Email</label>

                @error('email')
                    <div class="text-danger" style="font-size: small">{{ $message }}</div>
                @enderror
            </div>

            <div class="label-float">
                <input name="password" type='password' id='password' placeholder="">
                <label for='password'>Password</label>

                @error('password')
                    <div class="text-danger" style="font-size: small">{{ $message }}</div>
                @enderror
            </div>
            <p>
                <a href="{{ route('forget.password') }}">Forgot Password?</a>
            </p>
            <button class="button" type="submit">Login</button>

            <hr class="hr">


        </form>

        </div>
    </div>
@endsection
