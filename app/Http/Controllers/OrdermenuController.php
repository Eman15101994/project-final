<?php

namespace App\Http\Controllers;

use App\Models\Order_menu;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdermenuController extends Controller
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
        if(request()->user_select){
            $or=Order_menu::where('user_id',request()->user_select)->get();
        }
        elseif(request()->date){
            $or=Order_menu::whereDate('created_at',request()->date)->get();
        }
        else{
       // $orders=Order::all();
        $or=Order_menu::all();
    }
        return view("orders/checks",compact('or','allusers'));

    }
    public function myorders()
    {
        $user=Auth()->user();
        $data_user=Order_menu::where('user_id',$user->id)->get();
        return view('orders/myorders',compact('data_user'));
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
     * @param  \App\Models\Ordermenu  $ordermenu
     * @return \Illuminate\Http\Response
     */
    public function show(Ordermenu $ordermenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordermenu  $ordermenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordermenu $ordermenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordermenu  $ordermenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordermenu $ordermenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordermenu  $ordermenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordermenu $ordermenu)
    {
        //
    }
}
