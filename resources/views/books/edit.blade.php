@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Edit Book</h1>

                <!-- Form untuk update book -->
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menambahkan metode PUT untuk update -->

                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $book->title) }}" 
                               class="form-control" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Author -->
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" id="author" 
                               value="{{ old('author', $book->author) }}" 
                               class="form-control" required>
                        @error('author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Publisher -->
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <input type="text" name="publisher" id="publisher" 
                               value="{{ old('publisher', $book->publisher) }}" 
                               class="form-control" required>
                        @error('publisher')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Published Date -->
                    <div class="mb-3">
                        <label for="published_date" class="form-label">Published Date</label>
                        <input type="date" name="published_date" id="published_date" 
                               value="{{ old('published_date', $book->published_date) }}" 
                               class="form-control" required>
                        @error('published_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success w-100">
                        Update Book
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
