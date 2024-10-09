<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Some title' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased h-screen w-full">
    <object type="image/svg+xml" data="/icons.svg" class="hidden"></object>
    <div class="mx-auto relative w-full h-full flex flex-col justify-between">
        <div class="bg-primaryWhite">
            <livewire:header/>
        </div>

        <main class="bg-primaryWhite h-full">
            {{ $slot }}

            @yield('content')
        </main>

        <div class="bg-primaryBlack">
            <livewire:footer/>
        </div>
    </div>
</body>
</html>
