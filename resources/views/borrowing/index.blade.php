@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 display-6 fw-bold text-center">Borrowing Data</h1>
    <!-- Button to Add New Borrowing -->
    <div class="mb-3 text-end">
        <a href="{{ route('borrowing.create') }}" class="btn btn-primary">Add New Borrowing</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Borrower</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Borrowed Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrowings as $borrowing)
                    <tr>
                        <td>{{ $borrowing->members ? $borrowing->members->name : 'No member' }}</td>
                        <td>{{ $borrowing->members ? $borrowing->members->address : 'No address available' }}</td>
                        <td>{{ $borrowing->members ? $borrowing->members->phone_number : 'No phone number available' }}</td>
                        <td>{{ $borrowing->books ? $borrowing->books->title : 'No book' }}</td>
                        <td>{{ $borrowing->borrow_date }}</td>
                        <td>{{ $borrowing->due_date }}</td>
                        <td>{{ $borrowing->return_date }}</td>
                        <td>
                            @if ($borrowing->return_date)
                                <span class="badge bg-success">Returned</span>
                            @else
                                <span class="badge bg-warning">Not Returned</span>
                            @endif
                        </td>
                        <td>
                            <!-- Actions -->
                            <a href="{{ route('borrowing.show', $borrowing->id) }}" class="btn btn-info btn-sm">Details</a>
                            <a href="{{ route('borrowing.edit', $borrowing->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('borrowing.return', $borrowing->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure this book is returned?')">Return</button>
                            </form>
                            <form action="{{ route('borrowing.destroy', $borrowing->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this borrowing record?')">Delete</button>
                            </form>
                        </td>               
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No borrowing records available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
</div>
@endsection
