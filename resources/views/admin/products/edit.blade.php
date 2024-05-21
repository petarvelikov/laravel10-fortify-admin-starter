@extends('layouts.admin')

@section('content')

    <h1>Edit product out storehouse</h1>

    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PATCH')
    
        <div class="row m-3">
            <label class="form-label">Product name:</label>
            <div class="col">
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $product->name }}" />
            </div>
            <div class="col">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row m-3">
            <label class="form-label">Product category:</label>
            <div class="col">
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ $product->category_id }}">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id == $product->category_id)
                                selected
                            @endif>{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row m-3">
            <label class="form-label">Product price:</label>
            <div class="col">
                <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ $product->price }}" />
            </div>
            <div class="col">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row m-3">
            <label class="form-label">Product description:</label>
            <div class="col">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">
                    {{ $product->description }}
                </textarea>
            </div>
            <div class="col">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row m-5">
            <button class="btn btn-lg btn-primary" type="submit">Submit form</button>
        </div>
    </form>

@endsection
