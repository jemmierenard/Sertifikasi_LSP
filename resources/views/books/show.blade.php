@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Book Details</h1>
    
    <!-- Book Details Card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $book->title }}</h4>
            <h6 class="card-subtitle text-muted">By {{ $book->author }}</h6>
        </div>
        <div class="card-body">
            <p><strong>Publisher:</strong> {{ $book->publisher }}</p>
            <p><strong>Published Date:</strong> {{ $book->published_date }}</p>
            <p><strong>Member:</strong> 
                @if ($book->member)
                    {{ $book->member->name }}
                @else
                    Not Borrowed
                @endif
            </p>
        </div>
    </div>

    <!-- Back and Action Buttons -->
    <div class="mt-4 d-flex justify-content-between">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
        <div>
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
