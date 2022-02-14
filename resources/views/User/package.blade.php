@extends('main')

@section('container')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="profile mb-5">
    <h1>Hey There, {{auth()->user()->user_name}}</h1>
    
    @if (auth()->user()->package != null)
            <div class="profile-body">
            <h2>Here's Your Active Packages</h2>
                @if (auth()->user()->package == '1')
                <div class="package1">
                    <p class="card-text text-start">Package 1</p>
                    <p class="card-text text-start">Benefits:</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                   

                    <form action="/{{auth()->user()->user_name}}/package/remove"method="POST">
                    @csrf
                    <button type="submit">Cancel Package</button>
                    </form>
                   


                   
                </div>

                @endif

                @if (auth()->user()->package == '2')
                    <p class="card-text text-start">Package 2</p>
                    <p class="card-text text-start">Benefits:</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <form action="/{{auth()->user()->user_name}}/package/remove"method="POST">
                    @csrf
                    <button type="submit">Cancel Package</button>
                    </form>

                @endif


                @if (auth()->user()->package == '3')
                    <p class="card-text text-start">Package 3</p>
                    <p class="card-text text-start">Benefits:</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <form action="/{{auth()->user()->user_name}}/package/remove"method="POST">
                    @csrf
                    <button type="submit">Cancel Package</button>
                    </form>
                @endif

            </div>
            
    @endif
    @if (auth()->user()->package == Null)
            <h2>Here's Your Available Packages</h2>
            <div class="profile-body">
                <div class="info-tag">
                    <p class="card-text text-start">Package 1</p>
                    <p class="card-text text-start">Benefits:</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <a href="/{{auth()->user()->user_name}}/confirm/1" class="btn">Buy Package 1</a>
                </div>
                <div class="info-user">
                    <p class="card-text text-start">Package 2</p>
                    <p class="card-text text-start">Benefits:</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <a href="/{{auth()->user()->user_name}}/confirm/2" class="btn">Buy Package 2</a>
                </div>
                <div class="info-user">
                    <p class="card-text text-start">Package 3</p>
                    <p class="card-text text-start">Benefits:</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    <p class="card-text text-start">xxxxxxxxxxxxx</p>
                    
                    <a href="/{{auth()->user()->user_name}}/confirm/3" class="btn">Buy Package 3</a>
                </div>
            </div>
    @endif

    
</div>
@endsection
