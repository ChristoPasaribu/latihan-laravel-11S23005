<x-guest-layout>
    <div style="text-align:center; padding:50px 18px;">
        <h1 style="font-size:36px; color:#3b5bdb; margin-bottom:10px;">
            Selamat Datang di Todo List
        </h1>

        <p style="color:#4c6ef5; font-size:16px; margin-bottom:18px;">
            Buat todo baru??
        </p>

        <div style="display:flex; gap:12px; justify-content:center;">
            <a href="{{ route('login') }}"
               style="padding:10px 18px; border-radius:12px; background:#748ffc; color:white; text-decoration:none;">
                Login
            </a>

            <a href="{{ route('register') }}"
               style="padding:10px 18px; border-radius:12px; background:#d0ebff; color:#1c3d75; text-decoration:none;">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>
