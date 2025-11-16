@extends('layout')

@section('content')

<div class="container mt-5">

    <h2 class="mb-3">📋 Daftar Aktivitas Kamu</h2>

    <form action="{{ route('todos.search') }}" method="GET" class="mb-4">
        <input type="text" name="q" placeholder="Cari aktivitas..." 
               class="form-control" value="{{ request('q') }}">
    </form>

    <a href="{{ route('todos.create') }}" class="btn btn-pink mb-3">➕ Tambah Aktivitas</a>

    @if(session('success'))
        <script>
            Swal.fire('Berhasil!', '{{ session('success') }}', 'success');
        </script>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Judul</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($todos as $todo)
            <tr>
                <td>
                    @if($todo->cover)
                        <img src="/storage/{{ $todo->cover }}" width="80">
                    @else
                        -
                    @endif
                </td>

                <td>{{ $todo->title }}</td>
                <td>{!! $todo->note !!}</td>

                <td>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus aktivitas ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $todos->links() }}

</div>

@endsection
