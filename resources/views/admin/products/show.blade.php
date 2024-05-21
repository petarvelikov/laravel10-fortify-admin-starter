@extends('layouts.admin')

@section('content')

  <h1>{{ $product->name }}</h1>

  <p>Category: {{ $product->category->name }}</p>

  <p>Description: {{ $product->description }}</p>

  <p>Price: {{ $product->price }}</p>

@endsection
