@extends('main')

@section('main')
@include('role-permission.nav-links')
<div class="row">

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <h2>Edit User</h2>
                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                           {{-- Error message --}}
                            @error('name') <small>{{$message}}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" readonly value="{{ $user->email }}" required>
                           {{-- Error message --}}
                            @error('name') <small>{{$message}}</small>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="{{ $user->password }}" required>
                           {{-- Error message --}}
                            @error('name') <small>{{$message}}</small>@enderror
                        </div>
                        <label for="role" class="form-label">Roles</label>
                        <select name="roles[]" class="form-control" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option value="{{$role}}" {{in_array($role, $userRoles) ? 'selected':''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="mt-3 btn btn-primary">Update</button>
                        <a class="mt-3 btn btn-danger mx-2" href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-link">Delete</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@stop()
