@extends('admin.admin')


@section('main')

<h1>Category</h1>
<a href="{{ route('category.create') }}" class="btn btn-sm btn-success">Add new</a>
<hr  />
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->status == 'inactive' ? 'Inactive' : "Active"}}</td>
            <td>
                <form action="{{ route('category.destroy', $cat->id) }}" method="post">
                    @csrf @method('DELETE')
                    <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <button href="" class="btn btn-sm btn-danger">Delete</button>

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {{ $cats->onEachSide(5)->links() }} --}}

@stop()
