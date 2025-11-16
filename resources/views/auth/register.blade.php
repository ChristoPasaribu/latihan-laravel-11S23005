<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-slate-100 py-10">

        <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            {{-- Form Register --}}
            <div class="p-10">
                <h2 class="text-3xl font-bold text-blue-600 mb-6">Buat Akun Todo List</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nama</label>
                        <input name="name" type="text" value="{{ old('name') }}" required
                            class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" required
                            class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                        <input name="password" type="password" required
                            class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">
                    </div>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                        Daftar
                    </button>
                </form>
            </div>

            {{-- Ajak Login --}}
            <div class="bg-slate-50 p-10 flex flex-col justify-center border-l border-slate-200">
                <h3 class="text-2xl font-semibold text-blue-600">Sudah punya akun?</h3>

                <p class="mt-2 text-slate-600">
                    Masuk dan mulai catat aktivitasmu.
                </p>

                <a href="{{ route('login') }}"
                    class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition text-center">
                    Login
                </a>
            </div>

        </div>

    </div>
</x-guest-layout>
