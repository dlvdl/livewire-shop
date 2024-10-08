<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Some title' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased">
<div>
    <div>
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

            <main class="mt-6">
                {{ $slot }}
            </main>

            <footer class="py-16 text-center text-sm text-black dark:text-white/70">

            </footer>
        </div>
    </div>
</div>
</body>
</html>
