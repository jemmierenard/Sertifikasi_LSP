@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Borrowing Details</h1>
    
    <!-- Borrowing Details Card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Borrowing Information</h4>
        </div>
        <div class="card-body">
            <p><strong>Member Name:</strong> {{ $borrowings->members ? $borrowings->members->name : 'No member' }}</p>
            <p><strong>Member Address:</strong> {{ $borrowings->members ? $borrowings->members->address : 'No address available' }}</p>
            <p><strong>Member Phone:</strong> {{ $borrowings->members ? $borrowings->members->phone_number : 'No phone number available' }}</p>
            <p><strong>Book Title:</strong> {{ $borrowings->books ? $borrowings->books->title : 'No book' }}</p>
            <p><strong>Borrow Date:</strong> {{ $borrowings->borrow_date }}</p>
            <p><strong>Due Date:</strong> {{ $borrowings->due_date }}</p>
            <p><strong>Return Date:</strong> 
                @if ($borrowings->return_date)
                    {{ $borrowings->return_date }}
                @else
                    <span class="badge bg-warning text-dark">Not Returned Yet</span>
                @endif
            </p>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4 text-end">
        <a href="{{ route('borrowing.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection
