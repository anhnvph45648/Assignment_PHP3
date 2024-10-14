@extends('client.layouts.partials.master')
@section('content')
<section id="featured-books" class="py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header align-center">
                    <div class="title">
                        <span>Some quality items</span>
                    </div>
                    <h2 class="section-title">Search</h2>
                </div>

                <div class="product-list" data-aos="fade-up">
                    <div class="row">

                        


                        @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <a href="{{route('client.detail', $product->id)}}"><img src="{{Storage::url($product->thumbnail)}}" alt="Books" class="product-item" width="200px"></a><br>
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>{{ $product->name }}</h3>
                                        <span>{{ $product->quantity }}</span>
                                        <div class="item-price">$ {{ $product->price }}</div>
                                    </figcaption>
                                </div>
                            </div>
                        @endforeach
                    </div><!--ft-books-slider-->
                </div><!--grid-->


            </div><!--inner-content-->
        </div>
{{-- 
        <div class="row">
            <div class="col-md-12">

                <div class="btn-wrap align-right">
                    <a href="#" class="btn-accent-arrow">View all products <i
                            class="icon icon-ns-arrow-right"></i></a>
                </div>

            </div>
        </div> --}}
    </div>
</section>
@endsection