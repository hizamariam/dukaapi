<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::paginate(10);
    }
    public function search()
    {
        $products = Product::where('name','like',"%".request('search_query')."%")->paginate(10);
        return $products;
    }
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated());
        return response([
            'success'=>true,
            'data'=>$product
        ], 201);
    }
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $product->name =$data['name'];
        $product->price =$data['price'];
        $product->quantity =$data['quantity'];

        $product->save();
        return response([
            "success"=>true,
        ]);
    }
    public function show(Product $product)
    {
        return $product;
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return [
            "success"=>true
        ];
    }

}
