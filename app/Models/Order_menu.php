<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_menu extends Model
{
    use HasFactory;
    protected $fillable = ['user_name','email','amount','total_price','Room_No','Ext','notes','user_id'];

    

    public function user()
    {
        return $this->belongsTo(User::class);
       }
       public function order()
       {
           return $this->hasMany(Order::class);
          }
}
