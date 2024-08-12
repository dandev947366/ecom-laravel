@extends('main')

@section('main')
<div class="row">
    @foreach ($products as $prod)
    <div class="col-md-4 mb-4">
        <div class="card p-3" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">{{ $prod->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: {{ $prod->price }}</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{ route('product', $prod->id) }}" class="btn btn-primary">See more</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop()
