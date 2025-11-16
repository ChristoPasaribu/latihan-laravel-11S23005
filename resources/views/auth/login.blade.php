<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-100 via-white to-slate-200 p-6">

        <div class="w-full max-w-4xl bg-white shadow-xl rounded-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

            {{-- Bagian Form Login --}}
            <div class="p-10">
                <h2 class="text-3xl font-bold text-blue-600 mb-6">Masuk ke Todo List</h2>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- Input Email --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">
                    </div>

                    {{-- Input Password --}}
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                        <input name="password" type="password" required
                            class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none">
                    </div>

                    <div class="flex justify-between mt-2">
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                            Lupa password?
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                            Login
                        </button>
                    </div>
                </form>
            </div>

            {{-- Sidebar Ajak Daftar --}}
            <div class="bg-slate-50 p-10 flex flex-col justify-center border-l border-slate-200">
                <h3 class="text-2xl font-semibold text-blue-600">Belum punya akun?</h3>
                <p class="mt-2 text-slate-600">
                    Buat akun dan mulai simpan todo kamu secara aman.
                </p>

                <a href="{{ route('register') }}"
                    class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition text-center">
                    Daftar
                </a>
            </div>

        </div>
    </div>
</x-guest-layout>
