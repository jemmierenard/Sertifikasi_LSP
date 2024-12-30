@extends('layouts.app')

@section('content')
    <div class="mt-4 container">
        <h1 class="mb-4 display-4 text-center">Members Data</h1>

        <!-- Add New Member Button -->
        <div class="my-4 text-end">
            <a href="{{ route('members.create') }}" class="btn btn-success">
                <i class="bi bi-person-plus-fill"></i> Add New Member
            </a>
        </div>

        <!-- Members Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        <tr>
                            <td class="align-middle">{{ $member->name }}</td>
                            <td class="align-middle">{{ $member->address }}</td>
                            <td class="align-middle">{{ $member->phone_number }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye-fill"></i> Details
                                </a>
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this member?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No members found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop