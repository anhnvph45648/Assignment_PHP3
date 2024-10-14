@extends('admin.layouts.master')

@section('content')
    <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-3">Thêm mới</a>
    @session('message')
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endsession
    <form action="{{ route('admin.products.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{$product->name}}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Thumbnail</label><br>
            <img src="{{ Storage::url($product->thumbnail) }}" alt=""  width="100">
            <input type="file" name="thumbnail" id="" class="form-control">
            @error('thumbnail')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Price</label>
            <input type="text" name="price" id="" class="form-control" value="{{$product->price}}">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Quantity</label>
            <input type="text" name="quantity" id="" class="form-control" value="{{$product->quantity}}">
            @error('quantity')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="">Category Name</label>
            <select name="category_id" id="" class="form-select">
                @foreach ($categories as $cate)
                    <option 
                    @selected($product->category_id == $cate->id)
                    value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-info">SAVE</button>
    </form>
@endsection