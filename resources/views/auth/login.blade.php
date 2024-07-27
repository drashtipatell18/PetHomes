@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-w-h">
            <h1>Login</h1>
        <form action="{{ route('login')}}" method="POST">
            <div class="label-float">
                <input type='text' id='username' placeholder="">
                <label for='username'>Email</label>
            </div>

            <div class="label-float">
                <input type='password' id='password' placeholder="">
                <label for='password'>Password</label>
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
