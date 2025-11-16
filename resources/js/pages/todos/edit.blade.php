@extends('layouts.app')

@section('content')
<div class="card card-centered shadow-sm p-4">
  <h4>Edit Aktivitas</h4>

  <form method="POST" action="{{ route('todos.update', $todo->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input name="title" value="{{ old('title', $todo->title) }}" class="form-control" required>
      @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Catatan</label>
      <input id="notes_input" type="hidden" name="notes" value="{{ old('notes', $todo->notes) }}">
      <trix-editor input="notes_input"></trix-editor>
    </div>

    <div class="mb-3">
      <label class="form-label">Jatuh Tempo</label>
      <input name="due_date" type="date" class="form-control" value="{{ old('due_date', $todo->due_date?->format('Y-m-d')) }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Cover (ubah)</label>
      @if($todo->cover)
        <div class="mb-2">
          <img src="{{ asset('storage/'.$todo->cover) }}" style="width:120px; height:90px; object-fit:cover;" class="img-thumbnail">
        </div>
      @endif
      <input name="cover" type="file" accept="image/*" class="form-control">
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="is_done" name="is_done" {{ old('is_done', $todo->is_done)? 'checked':'' }}>
      <label class="form-check-label" for="is_done">Tandai selesai</label>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('todos.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
