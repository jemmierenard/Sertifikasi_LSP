@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Member Details</h1>
    
    <!-- Member Details Card -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Member Information</h4>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $member->name }}</p>
            <p><strong>Address:</strong> {{ $member->address }}</p>
            <p><strong>Phone Number:</strong> {{ $member->phone_number }}</p>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-4 text-end">
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to Members</a>
    </div>
</div>
@endsection
