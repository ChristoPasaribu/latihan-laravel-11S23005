<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? config('app.name', 'Todo App') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-slate-100 text-slate-800">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md border-b border-slate-200 px-6 py-4 flex justify-between items-center">
        <div class="font-bold text-xl text-blue-600">
            Todo List
        </div>

        <div class="flex items-center gap-4">
            @auth
                <a href="{{ route('dashboard') }}" class="text-slate-700 hover:text-blue-600 transition">Dashboard</a>
                <a href="{{ route('todos.index') }}" class="text-slate-700 hover:text-blue-600 transition">Todos</a>
                <a href="{{ route('profile.edit') }}" class="text-slate-700 hover:text-blue-600 transition">Profile</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-slate-700 hover:text-blue-600 transition">Login</a>

                <a href="{{ route('register') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                    Register
                </a>
            @endauth
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="max-w-5xl mx-auto mt-10 px-4">
        {{ $slot }}
    </main>

</body>
</html>
