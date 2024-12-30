@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Edit Borrowing Record</h1>

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form untuk edit borrowing -->
            <form action="{{ route('borrowing.update', $borrowings->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Member Selection -->
                    <div class="col-md-6 mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select name="member_id" id="member_id" class="form-control @error('member_id') is-invalid @enderror" required>
                            <option value="">Select Member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" {{ $borrowings->member_id == $member->id ? 'selected' : '' }}>
                                    {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Book Selection -->
                    <div class="col-md-6 mb-3">
                        <label for="book_id" class="form-label">Book</label>
                        <select name="book_id" id="book_id" class="form-control @error('book_id') is-invalid @enderror" required>
                            <option value="">Select Book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}" {{ $borrowings->book_id == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Borrow Date -->
                    <div class="col-md-6 mb-3">
                        <label for="borrow_date" class="form-label">Borrow Date</label>
                        <input type="date" name="borrow_date" id="borrow_date" 
                               class="form-control @error('borrow_date') is-invalid @enderror" 
                               value="{{ $borrowings->borrow_date }}" required>
                        @error('borrow_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Due Date -->
                    <div class="col-md-6 mb-3">
                        <label for="due_date" class="form-label">Due Date</label>
                        <input type="date" name="due_date" id="due_date" 
                               class="form-control @error('due_date') is-invalid @enderror" 
                               value="{{ $borrowings->due_date }}" required>
                        @error('due_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Return Date -->
                    <div class="col-md-6 mb-3">
                        <label for="return_date" class="form-label">Return Date (optional)</label>
                        <input type="date" name="return_date" id="return_date" 
                               class="form-control @error('return_date') is-invalid @enderror" 
                               value="{{ $borrowings->return_date }}">
                        @error('return_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100">Update Borrowing Record</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
