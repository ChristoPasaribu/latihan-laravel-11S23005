<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    // =======================
    // MENAMPILKAN LIST TODO
    // =======================
    public function index(Request $request)
{
    // Ambil value dari input form
    $search     = $request->search;
    $status     = $request->status;
    $hasCover   = $request->has_cover; // nilai: 1, 0, atau null

    // Query dasar
    $todos = Todo::query()
        ->where('user_id', auth()->id());

    // ============================
    // FILTER: PENCARIAN
    // ============================
    if ($search) {
        $todos->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    // ============================
    // FILTER: STATUS
    // done / pending
    // ============================
    if ($status == 'done') {
        $todos->where('is_done', true);
    } elseif ($status == 'pending') {
        $todos->where('is_done', false);
    }

    // ============================
    // FILTER: BERDASARKAN COVER
    // ============================
    if ($hasCover === "1") {
        // hanya todo yang punya cover
        $todos->whereNotNull('cover');
    } elseif ($hasCover === "0") {
        // hanya todo yang tidak punya cover
        $todos->whereNull('cover');
    }

    // Pagination
    $todos = $todos->latest()->paginate(20);

    return view('todos.index', compact('todos', 'search', 'status', 'hasCover'));
}



    // =======================
    // FORM TAMBAH DATA
    // =======================
    public function create()
    {
        return view('todos.create');
    }

    // =======================
    // SIMPAN DATA BARU
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string',
            'description' => 'nullable|string',
            'cover'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('todos', 'public');
        }

        Todo::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'description' => $request->description,
            'cover'       => $path,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil ditambahkan!');
    }

    // =======================
    // FORM EDIT DATA
    // =======================
    public function edit(Todo $todo)
    {
        // CEK PEMILIK DATA (ANTI ERROR authorize())
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        return view('todos.edit', compact('todo'));
    }

    // =======================
    // UPDATE DATA
    // =======================
    public function update(Request $request, Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title'       => 'required|string',
            'description' => 'nullable|string',
            'cover'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('todos', 'public');
            $todo->cover = $path;
        }

        $todo->title       = $request->title;
        $todo->description = $request->description;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo berhasil diperbarui!');
    }

    // =======================
    // HAPUS DATA
    // =======================
    public function destroy(Todo $todo)
    {
        if ($todo->user_id !== Auth::id()) {
            abort(403);
        }

        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo berhasil dihapus!');
    }
}
