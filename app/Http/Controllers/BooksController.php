<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\members;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Query awal untuk mengambil buku dengan relasi anggota
        $query = books::with('member');

        if($request->has('member_id') && $request->member_id){
            $query->where('member_id', $request->member_id);
        }

        $books = $query->get();

        $members = members::all();

        return view('books.index', compact('books','members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all members to populate in the form
        $members = members::all();

        return view('books.create', compact('members'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_date' => 'required|date',
        ]);

        // Create the book
        books::create($request->only([
            'title',
            'author',
            'publisher',
            'published_date'
        ]));

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Pastikan relasi 'member' ada di BooksModel
        $book = Books::with('member')->findOrFail($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Fetch the book along with its member
        $book = Books::findOrFail($id);
        $members = Members::all();

        return view('books.edit', compact('book', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255|unique:books,title,' . $id,
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_date' => 'required|date',
            'member_id' => 'nullable|exists:members,id',
        ]);

        // Cari buku yang akan diperbarui
        $book = Books::findOrFail($id);

        // Perbarui data buku
        $book->update($request->only([
            'title',
            'author',
            'publisher',
            'published_date',
        ]));

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari buku yang akan dihapus
        $book = Books::findOrFail($id);

        // Hapus buku
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
