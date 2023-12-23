@extends('master')

@section('title', 'Product_home')

@section('container')

    <section class="mt-5 mb-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach($products as $product)
                        <div class="col">
                            <div class="card h-100">
                                <img src="/products/{{ $product->image}}" class="card-img-top" height="200px">
                                <div class="card-body">
                                    <h2 class="card-title des-title">{{$product->name}}</h2>
                                    <p class="card-text pt-4 des-tex">{{ $product->des}}</p>
                                    <h3 class="card-text pb-3">$.{{$product->price}}</h3>
                                    <a href="/products/{{ $product->id}}/details" class="btn btn-success text-white btn-sm " style="float:right;" >Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $products->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection



