@extends('layouts.master')

@section('content')

    <div class="container">
        <h1 class="text-center">Items</h1>

        @foreach ($products as $item)
            <div class="card m-3 d-inline-block" style="width: 18rem;">
                <div class="card-header text-center" >{{ $item->name }}</div>
                <div class="text-center"><img src="/src/img/shop-def-img.jpg" class="card-img-top"  style="width: 175px; " alt="No Image"></div>
                <div class="card-body">
                    <p class="card-text">{{ $item->description }}</p>
                    <div class="row">
                        <div class="col"><p class="card-text">Price: {{ $item->price }}</p></div>
                        <div class="col"><a href="#" class="btn btn-sm btn-primary">Add to cart</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
