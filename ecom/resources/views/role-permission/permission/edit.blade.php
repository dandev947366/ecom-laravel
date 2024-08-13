@extends('main')

@section('main')
@include('role-permission.nav-links')
<div class="row">

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <h2>Edit Permissions</h2>
                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <form action="{{ route('permissions.update',$permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $permission->name }}" required>
                           {{-- Error message --}}
                            @error('name') <small>{{$message}}</small>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-danger mx-2" href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-link">Delete</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@stop()
