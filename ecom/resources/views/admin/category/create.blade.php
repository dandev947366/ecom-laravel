@extends('admin.admin')


@section('main')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-4">
            <div class="text-center mb-4">
                <h2>Create Category</h2>
            </div>
            <div class="border rounded-3 shadow-sm p-4">
                <form action="{{ route('category.store') }}" method="POST" role="form">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                        @error('name') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" id="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-link">Back to Admin Dashboard</a>
                </form>

            </div>
        </div>
    </div>
</div>
@stop()
