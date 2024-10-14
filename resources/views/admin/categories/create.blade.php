@extends('admin.layouts.master')

@section('content')
    <a href="{{route('admin.categories.create')}}" class="btn btn-primary mb-3">Thêm mới</a>

    <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-info">SAVE</button>
    </form>
@endsection