@extends('admin.layouts.master')

@section('content')
    {{-- <a href="{{route('admin.books.create')}}" class="btn btn-primary mb-3">Thêm mới</a> --}}
    @session('message')
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endsession
    <form action="{{ route('admin.categories.update', $category) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{$category->name}}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
       

        <button type="submit" class="btn btn-info">SAVE</button>
    </form>
@endsection