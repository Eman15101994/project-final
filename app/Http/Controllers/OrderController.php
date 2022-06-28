<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order_menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
   
        $or=Order_menu::all();
    
        return view("orders/orders",compact('or'));

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
       if ($request->product_name==''){
        return redirect()->back()->with('delete', 'Please add order');
       }
       $user=Auth()->user();
       $userdata=User::find($request->user_id);
       if($user->id == "1"){
       
       $e=Order_menu::create([
        "user_name"=>$userdata->name,
        "email"=>$userdata->email,
        "amount"=>$request->amount,
        "total_price"=>$request->total_price,
        "Room_No"=>$userdata->Room_No,
        "Ext"=>$userdata->Ext,
        "notes"=>$request->notes,
        "user_id"=>$request->user_id,
        
    ]);
}
else{
     $e=Order_menu::create([
            "user_name"=>$user->name,
            "email"=>$user->email,
            "amount"=>$request->amount,
            "total_price"=>$request->total_price,
            "Room_No"=>$user->Room_No,
            "Ext"=>$user->Ext,
            "notes"=>$request->notes,
            "user_id"=>$user->id,
            
        ]);
    }
    
        foreach($request->product_name as $key=>$p){
            Order::create([
                "product_name"=>$request->product_name[$key],
               "quantity"=>$request->quantity[$key],
               "price"=>$request->price[$key],
                "image"=>$request->image[$key],
                "order_menu_id"=>$e->id,
            ]);
        }
        $cart_delete=Cart::where('user_id',$user->id);
        $cart_delete->delete();
        return redirect()->back();
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
