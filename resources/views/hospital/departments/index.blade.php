@extends('layouts.sidebar')
@section('tittle', 'All Department')
@section('content')
    <div class="container-xxl py-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm rounded-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Department List</h4>
                <a href="{{ route('departments-create') }}" class="btn btn-primary btn-sm">Add New Department</a>
            </div>
            <div class="card-body table-responsive">
                @if($departments->count())
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $index => $department)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description ?? 'N/A' }}</td>
                                <td>{{ $department->created_at->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this department?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center mb-0">No departments found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

