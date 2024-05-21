@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Settings</h1>

        @if ($settings->count() > 0)
            <table class="table table-success table-bordered table-borderless table-striped table">
                <thead>
                    <th>ID</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th>
                        <a class="btn btn-success" href="{{ url('admin/settings/create') }}">Create new setting</a>
                    </th>
                </thead>
                <tfoot>
                    <th colspan="6">Брой записи: {{ $settings->count() }}</th>
                </tfoot>
                <tbody>
                    @foreach ($settings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->key }}</td>
                            <td>{{ $item->value }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ url('admin/settings', $item->id) }}">Show</a>
                                <a class="btn btn-sm btn-primary" href="{{ url('admin/settings/edit', $item->id) }}">Edit</a>
                                <a class="btn btn-sm btn-danger" href="{{ url('admin/settings/destroy', $item->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No settings found.</p>
        @endif
    </div>

@endsection
