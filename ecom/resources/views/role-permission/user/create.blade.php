@extends('main')

@section('main')
@include('role-permission.nav-links')
<div class="row">

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <h2>Create Users</h2>
                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                            @error('name') <small>{{$message}}</small>@enderror

                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                            @error('email') <small>{{$message}}</small>@enderror

                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            @error('password') <small>{{$message}}</small>@enderror
                        </div>
                        <label for="role" class="form-label">Roles</label>
                        <select name="roles[]" class="form-control" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{$role}}">{{$role->name}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="mt-3 btn btn-primary">Save</button>
                        <a href="{{ url('/users') }}" class="mt-3 btn btn-link">Go Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
