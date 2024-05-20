@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Users</h1>
    
        @if ($users)
            <table class="table table-success table-bordered table-borderless table-striped table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Is Admin</th>
                </thead>
                <tfoot>
                    <th colspan="4">Брой записи: {{ $users->count() }}</th>
                </tfoot>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ ($item->is_admin == 1) ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No users found.</p>
        @endif
    </div>

@endsection

