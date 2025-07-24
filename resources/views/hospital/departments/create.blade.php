@extends('layouts.sidebar')
@section('tittle', 'Add Department')
@section('content')
    <div class="container mt-4">
        <h4>Add Department</h4>
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Department Name</label>
                <input type="text" name="name" class="form-control" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-12">
                <label for="description	" class="form-label">Description</label>
                <textarea class="form-control" id="description	" name="description	" rows="3"></textarea>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
