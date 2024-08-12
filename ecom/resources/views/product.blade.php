@extends('main')

@section('main')
<div class="row">
    @foreach ($products as $prod)
    <div class="col-md-4 col-lg-4 mb-4">
        <div class="card" style="width: 100%;">
            <!-- Use a default image URL if the product image is not available -->
            {{-- <img src="{{ $prod->image ? asset('images/' . $prod->image) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_jQLYDfXfErKtmy_JLVAyIYfo_Xg8WejCkA&s' }}" class="card-img-top" alt="{{ $prod->name }}"> --}}
            <div class="card-body">
                <h5 class="card-title">{{ $prod->name }}</h5>
                <p class="card-text">Price: {{ $prod->price }}</p>
                <p class="card-text">Description</p>
                <a href="{{ route('home.product', $prod->id) }}" class="btn btn-primary">See more</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop()
