@extends('main')

@section('main')
<div class="row">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="text-center mb-4">
                    <h2>Permissions List</h2>
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create Permission</a>
                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a class="btn btn-danger mx-2" href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-link">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
