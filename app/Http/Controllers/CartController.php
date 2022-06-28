<?php

namespace App\Http\Controllers;
use App\Models\Product; 
  use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allusers=User::all();
        $user=auth()->user();
        $money=Cart::where('user_id',$user->id)->sum('price');
        $allcarts=$user->carts;

       return view('home', compact('allcarts','money'));
    }
    public function addcart(Request $request ,$id)
    {
        $data=Product::find($id);
        $user=Auth()->user();
        $total=$request->quantity * $data->price;

       Cart::create([
        "product_name"=>$data->name,        
        "price"=>$total,        
        "quantity"=>$request->quantity,        
        "image"=>$data->image,
        "user_id"=>$user->id,
        "product_id"=>$data->id
       ]);
       return redirect()->back();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }
    public function increment(Request $request,$id)
    {
       
        $increment=Cart::where('id',$id)->increment('quantity');
        $data=Cart::find($id);
        $original=Product::find($data->product_id);
        $data->price = $original->price * $data->quantity;
        $data->save();
        return redirect()->back();
    }
    public function decrement(Request $request,$id)
    {
        $decrement=Cart::where('id',$id)->decrement('quantity');
        $data=Cart::find($id);
        $original=Product::find($data->product_id);
        $data->price = $original->price * $data->quantity;
        $data->save();
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
        $cart->delete();
        return redirect()->back();
          
    }
    }

