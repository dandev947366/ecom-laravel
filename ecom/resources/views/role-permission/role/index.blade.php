@extends('main')

@section('main')
@include('role-permission.nav-links')
<div class="row">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="text-center mb-4">
                    <h2>Roles</h2>

                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ url('roles/'.$role->id.'/give-permission') }}" class="btn btn-success">Add / Edit Role Permission</a>
                                    <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a class="btn btn-danger mx-2" href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-link">Delete</a>
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
