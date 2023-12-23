<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
       return view('home',['products'=>Product::latest()->paginate(8)]);
    }
    public function add(){
        $products = Product::latest()->paginate(10);
        return view('products',['products'=>$products]);
    }
    public function create(){
        return view('add-products');
    }
    public function store(Request $request)
    {

        //validate data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'des' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gig|max:10000'
        ]);

        //upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        //send data
        $product = new Product();
        $product->image = $imageName;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->des = $request->des;

        $product->save();
        return back()->withSuccess('Product Add Successfully..!');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();

        return view('edit',['product' => $product]);
    }
    public  function update(Request $request, $id){

        //validate data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'des' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gig|max:10000'
        ]);
        $product = Product::where('id',$id)->first();
        if (isset($request->image)){
            //upload image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        //send data
        $product->name = $request->name;
        $product->price = $request->price;
        $product->des = $request->des;

        $product->save();
        return back()->withSuccess('Product Update Successfully..!');
    }
    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product is Delete successfully..!');
    }
    public function details($id){
        $product = Product::where('id',$id)->first();
        return view('details',['product' => $product]);
    }

}
