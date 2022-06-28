<?php

namespace App\Http\Controllers;
 use App\Models\Product; 
  use App\Models\User;
  use App\Models\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allproducts=Product::all();
        $allusers=User::all();
        $user=Auth()->user();
        $money=Cart::where('user_id',$user->id)->sum('price');
        $amount=Cart::where('user_id',$user->id)->count('quantity');
        $allcarts=$user->carts;
   
       return view('home', compact('allproducts','allusers','allcarts','money','amount'));

    }
    
}
