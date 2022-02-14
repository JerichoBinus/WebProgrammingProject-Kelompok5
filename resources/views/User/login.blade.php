@extends('main')

@section('container')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="/login" method="post" class="w-25 m-auto">
    {{csrf_field()}}
    <div class="form-login">
        <h1>Login Page</h1>
        Email address
        <input value="{{Cookie::get('email')}}" type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="example@mail.com" required>
    </div>
    <div class="form-login">
        Password
        <input value="{{Cookie::get('password')}}" type="password" name="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-login form-check">
        <input type="checkbox" name="remember_me" class="form-check-input">
        Remember me
    </div>
    <div class="d-flex flex-column justify-content-center">
        <button type="submit" class="btn">Login</button>
    </div>
</form>
<small class="regist-link">
    Not registered?
    <a href="/register">Register Now!</a>
</small>
@endsection
