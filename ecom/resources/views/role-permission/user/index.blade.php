@extends('main')

@section('main')
@include('role-permission.nav-links')
<div class="row">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <div class="text-center mb-4">
                    <h2>Users</h2>

                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{-- @if (!empty($user->getRolenames()))
                                    @foreach ($user->getRolenames() as $rolename)
                                    <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                    @endforeach
                                    @endif --}}
                                </td>
                                <td>
                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a class="btn btn-danger mx-2" href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-link">Delete</a>
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
