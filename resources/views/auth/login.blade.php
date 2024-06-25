@extends('layouts.auth-master')

@section('content')
<div class="card card-primary">
    <div class="card-header"><h4>Login</h4></div>
    <div class="card-body">
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username">Email</label>
                <input aria-describedby="usernameHelpBlock" id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Your email" tabindex="1" autofocus>
                <div class="invalid-feedback">
                {{ $errors->first('email') }}
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                </div>
                <input aria-describedby="passwordHelpBlock" id="password" type="password" placeholder="Your password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2">
                <div class="invalid-feedback">
                {{ $errors->first('password') }}
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
                </button>
            </div>
        </form>
    </div>
@endsection
