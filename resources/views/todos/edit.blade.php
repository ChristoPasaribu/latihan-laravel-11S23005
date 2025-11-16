<x-app-layout>
    <div class="card">
        <h3 style="color:#3b5bdb; margin-bottom:10px;">Ubah Aktivitas</h3>

        <form action="{{ route('todos.update', $todo) }}" method="POST" enctype="multipart/form-data" style="margin-top:12px;">
            @csrf
            @method('PUT')

            <div style="margin-bottom:10px;">
                <label style="display:block; color:#364fc7; font-weight:600;">Judul</label>
                <input name="title"
                       value="{{ old('title', $todo->title) }}"
                       style="width:100%; padding:10px; border-radius:8px; border:1px solid #d0d8ff; background:#f8f9ff;">
            </div>

            <div style="margin-bottom:10px;">
                <label style="display:block; color:#364fc7; font-weight:600;">Deskripsi</label>
                <textarea name="description" rows="4"
                          style="width:100%; padding:10px; border-radius:8px; border:1px solid #d0d8ff; background:#f8f9ff;">{{ old('description', $todo->description) }}</textarea>
            </div>

            <div style="margin-bottom:12px;">
                <label style="display:block; color:#364fc7; font-weight:600;">Cover (opsional)</label>

                @if($todo->cover)
                    <img src="{{ asset('storage/'.$todo->cover) }}"
                         style="width:160px; height:120px; object-fit:cover; display:block; margin:8px 0; border-radius:10px; border:1px solid #dbe4ff;">
                @endif

                <input type="file" name="cover" accept="image/*" style="margin-top:6px;">
            </div>

            <button type="submit"
                    style="background:#748ffc; color:white; padding:10px 16px; border-radius:10px; border:none; font-weight:600;">
                Update
            </button>

            <a href="{{ route('todos.index') }}"
               style="margin-left:10px; color:#364fc7; text-decoration:none; font-weight:600;">
                Batal
            </a>
        </form>
    </div>
</x-app-layout>
