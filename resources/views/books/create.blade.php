@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Add New Book</h1>

    <!-- Form to Create Book -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <!-- Book Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        class="form-control @error('title') is-invalid @enderror" 
                        value="{{ old('title') }}" 
                        placeholder="Enter book title"
                        required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Author -->
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input 
                        type="text" 
                        id="author" 
                        name="author" 
                        class="form-control @error('author') is-invalid @enderror" 
                        value="{{ old('author') }}" 
                        placeholder="Enter author name"
                        required>
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Publisher -->
                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input 
                        type="text" 
                        id="publisher" 
                        name="publisher" 
                        class="form-control @error('publisher') is-invalid @enderror" 
                        value="{{ old('publisher') }}" 
                        placeholder="Enter publisher name"
                        required>
                    @error('publisher')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Published Date -->
                <div class="mb-3">
                    <label for="published_date" class="form-label">Published Date</label>
                    <input 
                        type="date" 
                        id="published_date" 
                        name="published_date" 
                        class="form-control @error('published_date') is-invalid @enderror" 
                        value="{{ old('published_date') }}" 
                        required>
                    @error('published_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
