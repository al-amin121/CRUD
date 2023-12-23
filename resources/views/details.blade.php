@extends('master')

@section('title', 'Product_home')

@section('container')

    <section class="mt-5 pb-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="cl-md-12 mb-5">
                    <div class="col-md-5">
                        <div class="border">
                            <img src="/products/{{ $product->image}}" height="450px" width="400px">
                        </div>

                    </div>
                    <div class="col-md-7 bg-light pb-5 shadow ">
                        <h1 class="mt-2 pb-3">Name: <b>{{$product->name}}</b></h1>
                        <h3 class="pb-3">Price: $<b>{{$product->price}}</b></h3>
                        <p class="pb-3 text-break fw-normal detaildes">{{$product->des}}</p>
                        <button type="button" class="btn btn-success mt-5">Add To Cart</button>
                    </div>
                </div>
                <div class="col-md-12 bg-light">
                    <h1>descriptions:</h1>
                    <p class="text-break">{{$product->des}}</p>
                </div>
            </div>
        </div>
    </section>

@endsection




