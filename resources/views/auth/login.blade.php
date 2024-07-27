@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-w-h">
            <h1>Login</h1>

            <div class="label-float">
                <input type='text' id='username' placeholder=' ' required>
                <label for='username'>Email</label>
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
