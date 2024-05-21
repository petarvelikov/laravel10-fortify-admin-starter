@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Products</h1>

        @if($products)
            <table class="table table-success table-bordered table-borderless table-striped table">
                <thead>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>
                        <a class="btn btn-success" href="{{ url('admin/products/create') }}"><i class="bi bi-plus-square">&nbsp;</i>Create new product</a>
                    </th>
                </thead>
                <tfoot>
                    <th colspan="7">Брой записи: {{ $products->count() }}</th>
                </tfoot>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <a class="btn btn-sm btn-info disabled" href="{{ route('products.show', $item->id) }}"><i class="bi bi-eye">&nbsp;</i>Show</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $item->id) }}"><i class="bi bi-pencil">&nbsp;</i>Edit</a>
                                <form class="d-inline" action="{{ url('admin/products', $item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="delete-item-form btn btn-sm btn-danger" type="submit"><i class="bi bi-trash">&nbsp;</i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No products found.</p>
        @endif
    </div>

@endsection
