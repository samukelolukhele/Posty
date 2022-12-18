<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Posty</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center gap-3">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('posts') }}">Posts</a></li>
        </ul>
        <ul class="flex items-center gap-3">
            @auth
            <li><a href="/">{{ auth()->user()->name }}</a></li>
            <form action="{{ route('logout') }} " method="POST" class="inline">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @endauth
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
   @yield('content') 
</body>
</html>