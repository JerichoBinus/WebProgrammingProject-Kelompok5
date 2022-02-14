@extends('main')

@section('container')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="profile">
    <h1>Hey There, {{auth()->user()->user_name}}</h1>
    <h2>Here's What We Know About You</h2>
    @if (auth()->user()->role == 'admin')
            <div class="profile-body">
                <div class="info-tag">
                    <p class="card-text text-start">Name</p>
                    <p class="card-text text-start">Email</p>
                    <p class="card-text text-start">Role</p>
                </div>
                <div class="info-user">
                    <p class="card-text text-start">{{auth()->user()->user_name}}</p>
                    <p class="card-text text-start">{{auth()->user()->email}}</p>
                    <p class="card-text text-start">{{auth()->user()->role}}</p>
                </div>
            </div>


            <div class="btn-dir">
                <a href="/{{auth()->user()->user_name}}/update" class="btn">Update Profile</a>
                <a href="#" class="btn">Verify User</a>
                <a href="/logout" class="btn">Logout</a>
            </div>
    @endif
    @if (auth()->user()->role == 'member')
        <div class="profile-body mb-5">
            <div class="info-tag">
                <p class="card-text text-start">Name</p>
                <p class="card-text text-start">Email</p>
                <p class="card-text text-start">Gender</p>
                <p class="card-text text-start">Role</p>
            </div>
            <div class="info-user">
                <p class="card-text text-start">{{auth()->user()->user_name}}</p>
                <p class="card-text text-start">{{auth()->user()->email}}</p>
                <p class="card-text text-start">{{auth()->user()->gender}}</p>
                <p class="card-text text-start">{{auth()->user()->role}}</p>
            </div>
        </div>
        @if (auth()->user()->package != null)
        <h3 style="text-align: center;">Currently Active Package</h3>
        <h1>{{auth()->user()->package}}</h1>
        @endif
        <div class="btn-dir">
            <a href="/{{auth()->user()->user_name}}/update" class="btn">Update Profile</a>

            @if(auth()->user()->package != null)
                    <form action="/{{auth()->user()->user_name}}/package/remove"method="POST">
                    @csrf
                    <button type="submit" class="btn">Cancel Package</button>
                    </form>

            @endif
            @if(auth()->user()->package == null)
            <a href="/{{auth()->user()->user_name}}/package" class="btn">Buy Package</a>
            @endif

            <a href="/logout" class="btn">Logout</a>
        </div>
    @endif
</div>
@endsection
