<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\borrowing;
use App\Models\members;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data peminjaman beserta relasi anggota dan buku
        $borrowings = borrowing::with(['members', 'books'])->get();

        return view('borrowing.index', compact('borrowings')); // Tampilkan ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data anggota dan buku untuk dropdown pilihan
        $members = members::all();
        $books = books::whereDoesntHave('borrowings', function ($query) {
            $query->whereNull('return_date');
        })->get();
  
        return view('borrowing.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_date' => 'required|date',
            'return_date' => 'nullable'
        ]);

        // Hitung tanggal pengembalian (7 hari dari tanggal pinjam)

        $due_date = date('Y-m-d', strtotime($request->borrowed_date . ' +7 days'));

        $return_date = $request->input('return_date', null); 

        // Simpan data peminjaman
        borrowing::create([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrowed_date,
            'due_date' => $due_date, // Tanggal jatuh tempo
            'return_date' => $return_date,  // Nilai default return_date null, karena belum dikembalikan
        ]);

        return redirect()->route('borrowing.index')->with('success', 'Borrowing record created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil detail peminjaman berdasarkan ID
        $borrowings = borrowing::with(['members', 'books'])->findOrFail($id);

        return view('borrowing.show', compact('borrowings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data peminjaman untuk diedit
        $borrowings = borrowing::findOrFail($id);
        $members = members::all(); // Data anggota untuk dropdown
        $books = books::all(); // Data buku untuk dropdown

        return view('borrowing.edit', compact('borrowings', 'members', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi input
         $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
        ]);

        // Cari data peminjaman
        $borrowings = borrowing::findOrFail($id);

        // Hitung tanggal pengembalian baru
        $return_date = now()->parse($request->borrow_date)->addDays(7);

        // Perbarui data peminjaman
        $borrowings->update([
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $return_date,
        ]);

        return redirect()->route('borrowing.index')->with('success', 'Borrowing record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data peminjaman
        $borrowings = borrowing::findOrFail($id);
        $borrowings->delete();

        return redirect()->route('borrowing.index')->with('success', 'Borrowing record deleted successfully.');
    }

    public function returnBook($id)
    {
        // Find the borrowing record by its ID
        $borrowing = borrowing::findOrFail($id);

        // Update the return_date to the current date
        $borrowing->return_date = now();

        // Save the changes to the database
        $borrowing->save();

        // Redirect back to the index page with a success message
        return redirect()->route('borrowing.index')->with('success', 'Book returned successfully.');
    }

}
