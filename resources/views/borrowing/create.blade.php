@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Add New Borrowing</h1>

                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form untuk menambahkan borrowing -->
                <form action="{{ route('borrowing.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Member Selection -->
                        <div class="col-md-6 mb-3">
                            <label for="member_id" class="form-label">Select Member</label>
                            <select id="member_id" name="member_id" class="form-control @error('member_id') is-invalid @enderror">
                                <option value="">Select Member</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
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
                            <label for="book_id" class="form-label">Select Book</label>
                            <select id="book_id" name="book_id" class="form-control @error('book_id') is-invalid @enderror">
                                <option value="">Select Book</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                        {{ $book->title }} by {{ $book->author }}
                                    </option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Borrowed Date -->
                        <div class="col-md-6 mb-3">
                            <label for="borrowed_date" class="form-label">Borrowed Date</label>
                            <input type="date" id="borrowed_date" name="borrowed_date" 
                                   class="form-control @error('borrowed_date') is-invalid @enderror" 
                                   value="{{ old('borrowed_date') }}">
                            @error('borrowed_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success w-100">
                        Save Borrowing
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
