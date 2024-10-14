@extends('admin.layouts.master')

@section('content')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
    @session('message')
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endsession
    @session('status')
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endsession
    @session('error')
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endsession
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>

                        @if ($user->is_active)
                            <span class="badge bg-primary">YES</span>
                        @else
                            <span class="badge bg-danger">NO</span>
                        @endif
                    </td>

                    <td>
                        <a class="btn btn-danger mb-3" href="{{ route('admin.users.edit', $user) }}">Edit</a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning"
                                onclick="return confirm('are you sure?')">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{$data->links()}} --}}
@endsection