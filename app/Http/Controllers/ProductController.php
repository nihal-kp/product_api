<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.home',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->status = $request->status;
        // $product->image = $req->file('image')->store('images');

        if($request->hasFile('image1') && $request->hasFile('image2')) {
            
            $file1 = $request->file('image1') ;
            $file2 = $request->file('image2') ;
            
            $fileName1 = $file1->getClientOriginalName() ;
            $fileName2 = $file2->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file1->move($destinationPath,$fileName1);
            $file2->move($destinationPath,$fileName2);
            $product->image1 = $fileName1 ;
            $product->image2 = $fileName2 ;
        }
        else
        {
            return $request;
            $product->image1 = '';
            $product->image2 = '';
        }
        $product->save();
        return redirect('products');
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
        return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('products.edit',['product'=>$product,'categories'=>$categories]);
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
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->status = $request->status;
        // $product->image = $req->file('image')->store('images');

        if($request->hasFile('image1') && $request->hasFile('image2')) {
            
            $file1 = $request->file('image1') ;
            $file2 = $request->file('image2') ;
            
            $fileName1 = $file1->getClientOriginalName() ;
            $fileName2 = $file2->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file1->move($destinationPath,$fileName1);
            $file2->move($destinationPath,$fileName2);
            $product->image1 = $fileName1 ;
            $product->image2 = $fileName2 ;
        }
        else
        {
            return $request;
            $product->image1 = '';
            $product->image2 = '';
        }
        $product->save();
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products');
    }
}
