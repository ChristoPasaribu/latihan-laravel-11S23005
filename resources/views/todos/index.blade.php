<x-app-layout>
    <div class="card">

        <!-- HEADER -->
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
            <h3 style="color:#3b5bdb; margin:0;">Daftar Aktivitas</h3>

            <a href="{{ route('todos.create') }}"
               style="background:#748ffc; color:white; padding:8px 12px; border-radius:8px; text-decoration:none;">
                + Tambah
            </a>
        </div>

        <!-- FORM SEARCH & FILTER -->
        <form action="{{ route('todos.index') }}" method="GET"
              style="display:flex; gap:10px; margin-bottom:16px; background:#edf2ff; padding:12px; border-radius:10px;">

            <!-- Input Pencarian -->
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari judul atau deskripsi..."
                   style="flex:1; padding:10px; border-radius:8px; border:1px solid #d0d8ff;">

            <!-- Filter Berdasarkan Cover -->
            <select name="has_cover"
                    style="padding:10px; border-radius:8px; border:1px solid #d0d8ff; background:white;">
                <option value="">Semua</option>
                <option value="1" {{ request('has_cover') == '1' ? 'selected' : '' }}>Dengan Cover</option>
                <option value="0" {{ request('has_cover') == '0' ? 'selected' : '' }}>Tanpa Cover</option>
            </select>

            <!-- Tombol -->
            <button type="submit"
                    style="background:#3b5bdb; color:white; border:none; padding:10px 14px; border-radius:8px;">
                Filter
            </button>
        </form>

        <!-- NOTIFIKASI -->
        @if(session('success'))
            <div style="padding:10px; background:#edf2ff; color:#364fc7; border-radius:8px; margin-bottom:12px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- LIST TODO -->
        @if($todos->count() == 0)
            <div style="color:#4c6ef5;">Belum ada todo. Tambah dulu yuk!</div>
        @else
            <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(240px,1fr)); gap:12px;">
                @foreach($todos as $todo)
                    <div style="background:#fff; border-radius:12px; padding:12px; border:1px solid #dbe4ff;">
                        
                        @if($todo->cover)
                            <img src="{{ asset('storage/'.$todo->cover) }}"
                                 style="width:100%; height:140px; object-fit:cover; border-radius:8px; margin-bottom:8px;">
                        @endif

                        <h4 style="margin:0 0 6px 0; color:#3b5bdb;">{{ $todo->title }}</h4>

                        <p style="margin:0 0 8px 0; color:#5c7cfa; font-size:14px;">
                            {{ \Illuminate\Support\Str::limit($todo->description, 120) }}
                        </p>

                        <div style="display:flex; gap:8px; margin-top:8px;">
                            <a href="{{ route('todos.edit', $todo) }}"
                               style="background:#91a7ff; padding:6px 8px; border-radius:8px; text-decoration:none; color:white;">
                                Ubah
                            </a>

                            <form action="{{ route('todos.destroy', $todo) }}" method="POST"
                                  onsubmit="return confirm('Hapus todo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        style="background:#748ffc; border:none; padding:6px 8px; border-radius:8px; color:white;">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="margin-top:14px;">
                {{ $todos->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
