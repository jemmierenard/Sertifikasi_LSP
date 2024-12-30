<?php

namespace App\Http\Controllers;

use App\Models\members;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data anggota
        $members = members::all(); // Dengan relasi buku
        return view('members.index', compact('members')); // Tampilkan ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:12',
            'address' => 'required|string|max:500',
        ]);

        // Simpan anggota baru
        members::create($request->all());

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Ambil anggota berdasarkan ID 
         $member = members::findOrFail($id);
         return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data anggota untuk diedit
        $member = members::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validasi input
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
        ]);

        // Update data anggota
        $member = members::findOrFail($id);
        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Hapus anggota
         $member = members::findOrFail($id);
         $member->delete();
 
         return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
