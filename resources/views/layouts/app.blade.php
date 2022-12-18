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
            <li><a href="/">Home</a></li>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/posts">Posts</a></li>
        </ul>
        <ul class="flex items-center gap-3">
            @auth
            <li><a href="/">Samukelo Lukhele</a></li>
            <li><a href="/logout">Logout</a></li>
            @endauth
            @guest
            <li><a href="/login">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @endguest
        </ul>
    </nav>
   @yield('content') 
</body>
</html>