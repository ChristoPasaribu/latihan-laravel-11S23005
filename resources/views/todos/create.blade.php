<x-app-layout>
    <div class="card">
        <h3 style="color:#3b5bdb; margin-bottom:10px;">Tambah Aktivitas</h3>

        <form action="{{ route('todos.store') }}" method="POST" enctype="multipart/form-data" style="margin-top:12px;">
            @csrf

            <div style="margin-bottom:10px;">
                <label style="display:block; color:#364fc7; font-weight:600;">Judul</label>
                <input name="title"
                       value="{{ old('title') }}"
                       style="width:100%; padding:10px; border-radius:8px; border:1px solid #d0d8ff; background:#f8f9ff;">
            </div>

            <div style="margin-bottom:10px;">
                <label style="display:block; color:#364fc7; font-weight:600;">Deskripsi</label>
                <textarea name="description" rows="4"
                          style="width:100%; padding:10px; border-radius:8px; border:1px solid #d0d8ff; background:#f8f9ff;">{{ old('description') }}</textarea>
            </div>

            <div style="margin-bottom:14px;">
                <label style="display:block; color:#364fc7; font-weight:600;">Cover (opsional)</label>
                <input type="file" name="cover" accept="image/*" style="margin-top:6px;">
            </div>

            <button type="submit"
                    style="background:#748ffc; color:white; padding:10px 16px; border-radius:10px; border:none; font-weight:600;">
                Simpan
            </button>

            <a href="{{ route('todos.index') }}"
               style="margin-left:10px; color:#364fc7; text-decoration:none; font-weight:600;">
                Batal
            </a>
        </form>
    </div>
</x-app-layout>
