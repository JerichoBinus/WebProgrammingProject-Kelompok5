<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Template</title>
</head>
<body>
    <div class="header">
        <a href="/"><img class="logo" src="/image/logo.png" alt=""></a>
        <ul class="navbar">
            <li><a href="/">Home</a></li>
            @auth
                @if (auth()->user()->role == 'admin')
                    <li><a href="/founder">FounderDaddy</a></li>
                    <li><a href="/{{auth()->user()->user_name}}">Profile</a></li>
                    <li><a href="/logout">Logout</a></li>
                @endif
                @if (auth()->user()->role == 'member')
                <li><a href="/founder">FounderDaddy</a></li>
                <li><a href="/{{auth()->user()->user_name}}">Profile</a></li>
                @endif
            @else
                <li><a href="/founder">FounderDaddy</a></li>
                <li><a href="/login">Login</a></li>
            @endauth
        </ul>
    </div>

    <div class="content" >
        @yield('container')
    </div>

    <div class="footer">
        © Iron Paradise Gym
    </div>
</body>
</html>
