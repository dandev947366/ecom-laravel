@extends('main')

@section('main')

<div class="row">

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="text-center mb-4">
                    <h2>Role: {{ $role->name }}</h2>
                </div>
                <div class="border rounded-3 shadow-sm p-4">
                    <form action="{{ url('roles/'.$role->id.'/give-permission') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Permissions</label>
                            <div class="row">
                                @foreach ($permissions as $permission)

                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"/>
                                        {{$permission->name}}
                                    </label>

                                </div>
                                @endforeach
                            </div>



                           {{-- Error message --}}
                            @error('name') <small>{{$message}}</small>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-danger mx-2" href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-link">Delete</a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@stop()
