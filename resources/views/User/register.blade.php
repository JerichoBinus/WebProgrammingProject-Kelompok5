@extends('main')

@section('container')
<form action="/register" method="post" class="w-25 m-auto">
    @csrf
    <div class="form-regist">
        <h1>Register Page</h1>
        User Name
        <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror"
        placeholder="User Name" required value="{{ old('user_name')}}">
        @error('user_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-regist">
        Email
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp"
        placeholder="example@mail.com" required value="{{ old('email')}}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-regist">
        Password
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-regist-b">
        Gender
        <div class="form-check">
            <label><input type="radio" id="male" name="gender" value="male" class="form-check-input" required>Male</label>
            <label><input type="radio" id="female" name="gender" value="female" class="form-check-input" required>Female</label>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-center">
        <button type="submit" class="btn">Register</button>
    </div>
</form>
<small class="login-link">
    Already Has An Account?
    <a href="/login">Login Now!</a>
</small>
@endsection
