<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title ?? 'Welcome' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-200 via-white to-slate-100 font-sans flex items-center justify-center">

    <div class="w-[95%] max-w-3xl bg-white/90 backdrop-blur-md p-10 rounded-2xl shadow-xl border border-slate-200">
        {{ $slot }}
    </div>

</body>
</html>
