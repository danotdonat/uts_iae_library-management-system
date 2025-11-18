<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET: Ambil semua data buku
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    // POST: Tambah buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'jumlah_halaman' => 'required|integer',
            'kategori' => 'required',
            'isbn' => 'required',
            'status' => 'required|in:Tersedia,Dipinjam',
        ]);

        $book = Book::create($validated);
        return response()->json($book, 201);
    }

    // GET: Ambil 1 buku berdasarkan ID
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        return response()->json($book, 200);
    }

    // PUT: Update buku
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) return response()->json(['message' => 'Buku tidak ditemukan'], 404);

        $book->update($request->all());
        return response()->json($book, 200);
    }

    // DELETE: Hapus buku
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) return response()->json(['message' => 'Buku tidak ditemukan'], 404);

        $book->delete();
        return response()->json(['message' => 'Buku berhasil dihapus'], 200);
    }
}
