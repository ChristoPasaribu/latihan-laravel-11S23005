<x-app-layout>
    <div class="card">
        <h2 style="color:#3b5bdb; font-size:24px; margin-bottom:6px;">
            Halo, {{ Auth::user()->name }} 👋
        </h2>

        <p style="color:#4c6ef5; margin-bottom:12px;">
            Selamat datang di dashboard
        </p>

        <div style="display:flex; gap:12px; align-items:center; margin-bottom:16px;">
            <a href="{{ route('todos.index') }}"
               style="background:#748ffc; color:white; padding:10px 14px; border-radius:10px; text-decoration:none;">
                Lihat Todo
            </a>

            <a href="{{ route('todos.create') }}"
               style="background:#91a7ff; color:white; padding:10px 14px; border-radius:10px; text-decoration:none;">
                Tambah Todo
            </a>
        </div>

        <div>
            <strong style="color:#3b5bdb;">Jumlah Todo:</strong>
            {{ \App\Models\Todo::where('user_id', Auth::id())->count() }}
        </div>
    </div>
</x-app-layout>
