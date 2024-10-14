@extends('admin.layouts.master')

@section('content')
    <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-3">Thêm mới</a>

    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Thumbnail</label>
            <input type="file" name="thumbnail" id="" class="form-control">
            @error('thumbnail')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Price</label>
            <input type="text" name="price" id="" class="form-control">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Quantity</label>
            <input type="text" name="quantity" id="" class="form-control">
            @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Category Name</label>
            <select name="category_id" id="" class="form-select">
                @foreach ($categories as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-info">SAVE</button>
    </form>
@endsection