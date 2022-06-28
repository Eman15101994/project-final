<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware("auth")->only(["store","update","destroy"]);
    }
    public function index()
    {
        //
        $products = Product::all();
        return view ("products/index",["products"=>$products]);
      
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
           return view("products/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
           $request->validate([
            "name"=> "required",
            "price"=> "required",
            "category"=> "required",
            "image"=> "required",
           ]);
           $image = $request->file("image");

           if($image){
               $imageDestinationPath ="uploads/images/";
               $productimage = date("YmdHis").".".$image->getClientOriginalExtension();
               $image->move($imageDestinationPath,$productimage);
               $request->image = $productimage;
           }
    
          Product::create([
          "name"=>$request->name,
         "price"=>$request->price,
         "category"=>$request->category,
          "image"=>$request->image,
         ]);
         return redirect()->route("products.index");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view("products/edit",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request_data =$request->all();
        $request->validate([
            "name"=> "required",
            "price"=> "required",
            "category"=> "required",
            "image"=> "required",
           ]);
           $image = $request->file("image");
           if($image){
            $imageDestinationPath ="uploads/images/";
            $productimage = date("YmdHis").".".$image->getClientOriginalExtension();
            $image->move($imageDestinationPath,$productimage);
            $request->image = $productimage;
            $request_data["image"]=$productimage;
        }
        $product->update($request_data);
        return redirect()->route("products.index",$product);
    
       

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
            
        $product->delete();
        return redirect()->route('products.index');
          
    }
}

