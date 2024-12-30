@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Edit Member</h1>

                <!-- Form untuk update member -->
                <form action="{{ route('members.update', $member->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menambahkan metode PUT untuk update -->

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
                            class="form-control" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number"
                            value="{{ old('phone_number', $member->phone_number) }}" 
                            class="form-control" required maxlength="12">
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="3" class="form-control" required>{{ old('address', $member->address) }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="join_date" class="form-label">Join Date</label>
                        <input type="date" name="join_date" id="join_date" value="{{ old('join_date', $member->join_date) }}"
                            class="form-control" required>
                        @error('join_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Update Member
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop