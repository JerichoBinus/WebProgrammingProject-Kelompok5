@extends('main')

@section('container')
    <div class="greeting">
        @auth
            @if (auth()->user()->role == 'admin')
                <h2>Welcome Admin!</h2>
            @endif
        @endauth
        <h1>Blood Sweat Respect</h1>
        <h1>The First Two You Give, The Last One You Earn</h1>
    </div>
    <div class="program">
        <h2>Our Programs</h2>
    </div>
    <div class="program">
        <div class="image">
            <img src="/image/Program1.png" alt="">
            <img src="/image/Program1Hvr.png" class="img-top" alt="">
        </div>
        <div class="image">
            <img src="/image/Program2.jpg" alt="">
            <img src="/image/Program2Hvr.jpg" class="img-top" alt="">
        </div>
        <div class="image">
            <img src="/image/Program3.jpg" alt="">
            <img src="/image/Program3Hvr.jpg" class="img-top" alt="">
        </div>
    </div>
    <div class="btn-layout">
        <a href="/register" class="btn">JOIN OUR FRIGGIN GYM!!!</a>
    </div>
@endsection
