<x-app-layout>
    <div class="card">
        <h3 style="color:#1d4ed8;">Edit Profile</h3>

        @if(session('success'))
            <div style="background:#e0f2fe; padding:8px; border-radius:8px; margin-bottom:8px; color:#075985;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <div style="margin-bottom:8px;">
                <label style="display:block; color:#334155;">Nama</label>
                <input 
                    name="name" 
                    value="{{ old('name', $user->name) }}" 
                    style="width:100%; padding:10px; border-radius:8px; border:1px solid #cbd5e1;"
                >
            </div>

            <div style="margin-bottom:12px;">
                <label style="display:block; color:#334155;">Email</label>
                <input 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    style="width:100%; padding:10px; border-radius:8px; border:1px solid #cbd5e1;"
                >
            </div>

            <button 
                type="submit" 
                style="background:#3b82f6; color:white; padding:10px 14px; border-radius:10px; border:none;"
            >
                Simpan
            </button>

            <form 
                action="{{ route('profile.destroy') }}" 
                method="POST" 
                style="display:inline-block; margin-left:12px;" 
                onsubmit="return confirm('Hapus akun?');"
            >
                @csrf
                @method('DELETE')
                <button 
                    type="submit" 
                    style="background:#ef4444; color:white; padding:10px 14px; border-radius:10px; border:none;"
                >
                    Hapus Akun
                </button>
            </form>
        </form>
    </div>
</x-app-layout>
