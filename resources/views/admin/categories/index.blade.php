@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Categories</h1>
    
        @if ($categories->count() > 0)
            <table class="table table-success table-bordered table-borderless table-striped table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>
                        <a class="btn btn-success" href="{{ route('categories.create') }}"><i class="bi bi-plus-square">&nbsp;</i>Create new category</a>
                    </th>
                </thead>
                <tfoot>
                    <th colspan="6">Брой записи: {{ $categories->count() }}</th>
                </tfoot>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('categories.edit', $item->id) }}"><i class="bi bi-pencil">&nbsp;</i>Edit</a>
                            <form class="d-inline" action="{{ url('admin/categories', $item->id) }}" method="POST">
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
            <p>No categories found.</p>
        @endif
    </div>

@endsection

