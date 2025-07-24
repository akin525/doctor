@extends('layouts.sidebar')
@section('tittle', 'Edit Department')
@section('content')
    <div class="container mt-4">
        <h4>Edit Department</h4>
        <form method="POST" action="{{ route('departments.update', $department->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Department Name</label>
                <input type="text" name="name" value="{{ $department->name }}" class="form-control" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
