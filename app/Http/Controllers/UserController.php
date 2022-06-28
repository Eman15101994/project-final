<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::all();
        return view ("customers/index",["users"=>$users]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("auth/register");
        
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
        dump($request);
       $request->validate([
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
            "Room_No"=> "required",
            "Profile_Picture"=> "required",
            "Ext"=> "required",
      ]);

    

       $image = $request->file("Profile_Picture");

        if($image){
            $imageDestinationPath ="uploads/images/";
            $customerimage = date("YmdHis").".".$image->getClientOriginalExtension();
            $image->move($imageDestinationPath,$customerimage);
            $request->Profile_Picture = $customerimage;
        }
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> $request->password,
            "Room_No"=> $request->Room_No,
            "Profile_Picture"=> $request->Profile_Picture,
        ]);
        return redirect()->route("customers.create");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view("customers/edit",["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
     $request->validate([
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
            "Room_No"=> "required",
            "Profile_Picture"=> "required",
            "Ext"=> "required",
        ]);
        $image = $request->file("image");

        if($image){
            $imageDestinationPath ="uploads/images/";
            $customerimage = date("YmdHis").".".$image->getClientOriginalExtension();
            $image->move($imageDestinationPath,$customerimage);
            $request->image = $customerimage;
        }
        $user->update($request_data);
        return redirect()->route("customers.index",$user);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        if($user == 1){
            return redirect()->route("customers.index")->with('delete', 'you can not Delete Admin !');
        }
        $deletedata = User::find($user);
        $deletedata->delete();
        return redirect()->route("customers.index");
        
    }
}
