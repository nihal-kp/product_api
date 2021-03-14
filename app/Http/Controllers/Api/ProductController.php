<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        // return StudentDetail::all();
        $products = Product::get();
        foreach($products as $product){
            $data[] = [
                        "id"=>$product->id,
                        "name"=>$product->name,
                        "category"=>$product->category->name,
                        "slug"=>$product->slug,
                        "price"=>$product->price,
                        "image"=>$product->image,
                        "status"=>$product->status,
                    ];
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addProduct = Product::create($request->all());
        if(!$addProduct) {
            return ["Result"=>"Operation Fails!"];
        }
        return ["Result"=>"New Product has been added."];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return [
                        "id"=>$product->id,
                        "name"=>$product->name,
                        "category"=>$product->category->name,
                        "slug"=>$product->slug,
                        "price"=>$product->price,
                        "image"=>$product->image,
                        "status"=>$product->status,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateProduct = Product::find($id);
        $updateProduct->update($request->all());
        if(!$updateProduct) {
            return ["Result"=>"Operation Fails!"];
        }
        return ["Result"=>"Product details has been updated."];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProduct = Product::find($id)->delete();
        if(!$deleteProduct) {
            return ["Result"=>"Operation Fails!"];
        }
        return ["Result"=>"Product has been deleted."];
    }
}
