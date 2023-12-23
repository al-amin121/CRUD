@extends('master')

@section('title', 'Product_home')

@section('container')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto ">
                    <div class="card bg-light p-3 ">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <h2 class="mb-5">Edit Products\\{{ $product->name}}</h2>

                        <form action="/products/{{ $product->id}}/update" method="post" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class=" fw-bolder fs-3">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class=" fw-bolder fs-3">Price:</label>
                                <input type="text" name="price" class="form-control" value="{{old('price',$product->price)}}">
                                @if($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class=" fw-bolder fs-3">Description:</label>
                                <textarea name="des" class="form-control" cols="10" rows="3">{{old('des',$product->des)}}</textarea>
                                @if($errors->has('des'))
                                    <span class="text-danger">{{ $errors->first('des')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class=" fw-bolder fs-3">Image:</label>
                                <input type="file" name="image" class="form-control">
                                @if($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label ></label>
                                <input type="submit" class="btn btn-success mt-2" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
