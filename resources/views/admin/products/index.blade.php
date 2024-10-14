@extends('admin.layouts.master')

@section('content')

    @session('message')
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endsession
   
  

    <div class="table-responsive">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create</a>
        <table class="table table-primary" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Thumbnail</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $product)
                    
            
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        @if ($product->thumbnail)
                            <img src="{{Storage::url($product->thumbnail)}}" alt="" width="150px">
                        @endif
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a class="btn btn-info mb-3"  href="{{ route('admin.products.show', $product) }}">Show</a> 
                        <a class="btn btn-danger mb-3"  href="{{  route('admin.products.edit', $product ) }}">Edit</a>

                        <form action="{{  route('admin.products.destroy', $product ) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning" onclick="return confirm('are you sure?')">Delete</button>
                        </form>
    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection