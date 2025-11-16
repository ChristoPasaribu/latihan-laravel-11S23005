@extends('layout')

@section('content')

<h2>➕ Tambah Aktivitas</h2>

<form action="{{ route('todos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Judul:</label>
    <input type="text" name="title" class="form-control" required>

    <label class="mt-3">Catatan:</label>
    <input id="note" type="hidden" name="note">
    <trix-editor input="note"></trix-editor>

    <label class="mt-3">Cover (opsional):</label>
    <input type="file" name="cover" class="form-control">

    <button class="btn btn-pink mt-4">Simpan</button>
</form>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.umd.min.js"></script>
@endpush
