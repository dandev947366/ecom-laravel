@extends('main')

@section('main')

<div class="row">

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <h2>Create Permissions</h2>
                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                           {{-- Error message --}}
                            @error('name') <small>{{$message}}</small>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ url('/permissions') }}" class="btn btn-link">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@stop()
