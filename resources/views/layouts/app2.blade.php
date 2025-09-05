<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Let'em cook!</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asimovian&family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <link href={{asset("css/app.css") }} rel="stylesheet">    
    
</head>
<body class="background">
    <header>
        @include('layouts.header')
    </header>
    <main class="container-center flex flex-col items-center md:flex-col">        
        @yield('content')
    </main>    
    <footer>
        @include('layouts.footer')
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="//unpkg.com/alpinejs" defer></script> 
</html>