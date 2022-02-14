@extends('main')

@section('container')
<form action="/{{auth()->user()->user_name}}" method="post" class="w-25 m-auto">
    @csrf
    <div class="form-update">
        <h1>Update Profile</h1>
        Full Name
        <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror"
        placeholder="User Name" required value="{{ old('user_name', $user->user_name)}}">
        @error('user_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-update">
        Email address
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp"
        placeholder="example@mail.com" required value="{{ old('email', $user->email)}}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-update">
        Password
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="change">
        <div class="d-flex flex-column justify-content-center">
            <button type="submit" class="btn">Update</button>
        </div>
    </div>
</form>
@endsection
