@extends('master')

@section('title', 'Product_home')

@section('container')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="text-right">
                        <a class="btn btn-success" href="{{ route('add-products')}}">+ New Product</a>
                    </div>
                    <div class="container mt-2 shadow">
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th scope="col">SNo.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>

                                <th scope="col">Price</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{ $loop->index +1}}</th>
                                        <td>{{ $product->name}}</td>
                                        <td>
                                            <img src="products/{{ $product->image}}" width="40px" height="40px">
                                        </td>

                                        <td>{{ $product->price}}</td>
                                        <td class="text-center">
                                            <a href="products/{{ $product->id }}/edit" class="btn btn-success btn-sm me-5"><i class="fa fa-regular fa-pen-to-square"></i></a>
                                            <a href="products/{{ $product->id }}/delete" class="btn btn-danger btn-sm"><i class="fa fa-solid fa-trash-can"></i></a>

                                            {{--This is laravel ORM method for delete
{{--                                            <form method="post" action="products/{{ $product->id }}/delete">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
