@extends('admin.layouts.master')

@section('content')
    <a href="{{route('admin.users.create')}}" class="btn btn-primary mb-3">Thêm mới</a>

    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>    
        <div class="mb-3">
            <label for="">Password</label>
            <textarea name="password" cols="30" rows="10" class="form-control"></textarea>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Role</label>
            <textarea name="role" cols="30" rows="10" class="form-control"></textarea>
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-info">SAVE</button>
    </form>
@endsection