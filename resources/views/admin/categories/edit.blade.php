@extends('layouts.admin')

@section('content')

    <h1>Edit category</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        @csrf
        @method('PATCH')
    
        <div class="row m-3">
            <label class="form-label">Category name:</label>
            <div class="col">
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ $category->name }}" />
            </div>
            <div class="col">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row m-5">
            <button class="btn btn-lg btn-primary" type="submit">Submit form</button>
        </div>
    </form>

@endsection
