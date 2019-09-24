<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function store(StoreProduct $request)
    {
        //return $request->all();
        $this->authorize('product.create', Product::class);

        $product =new Product;
        $product->fill($request->all());
        $product->save();

        return new ProductResource($product);

    }

    public function index()
    {
        $this->authorize('product.index', Product::class);

        $products = Product::all();

        return ProductResource::collection($products);

    }

    public function show($id)
    {
        
         $product = Product::where('id',$id)->first();

         if(!$product) return abort(404);

         $this->authorize('product.show', $product);

         return new ProductResource($product);
    }

    public function update(StoreProduct $request, $id)
    {
         $product = Product::where('id', $id)->first();

         if(!$product) return abort(404);

         $this->authorize('product.update', $product);

         $update = Product::findOrFail($product->id);
         $update->fill($request->all());
         $update->save();

         return new ProductResource($update);
    }

    public function destroy($id)
    {
        $product = Product::where('id',$id)->get();

        if(!$product) return abort(404);

        $this->authorize('product.delete', $product);

        $delete = Product::where('id', $id)->delete();

        return  ProductResource::collection($product);
    }

    public function search(Request $request)
    {
        
        $products = Product::all();

        $this->authorize('product.search', $products);

        $search_product=$request->input('search_product');

        $filtered = Product::where('product_name','LIKE','%'.$search_product.'%')->orWhere('product_price','LIKE','%'.$search_product.'%')->get();

        $err['data']="no product found";
        
        if(count($filtered) ==0) return $err;

        return  ProductResource::collection($filtered);
    }

    public function test(Request $request)
    {
       

         $Products=Product::all();

          $amount="₹190";

         $Product = $Products->reject(function ($Product) use ($amount) {
            return $Product->product_price ===$amount;
        })
        ->map(function ($Product) {
            return $Product;
        });

    
        return  ProductResource::collection($Product);

        
    }
   



}
