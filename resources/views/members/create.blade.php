@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Create New Member</h2>

                <!-- Form untuk menambah member -->
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf

                    <!-- Nama Member -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="form-control" placeholder="Enter member name" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                            class="form-control" placeholder="Enter phone number" required>
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="4" class="form-control"
                            placeholder="Enter address" required>{{ old('address') }}</textarea>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            Create Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop