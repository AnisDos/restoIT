<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Charge;
use App\OrderDelivery;
    

class DeliveryCompany extends Model
{
    

protected $guarded =[];

  public function user()
    {
        return $this->belongsTo(User::class);
    }


    
public function charges()
 {
     return $this->hasMany(Charge::class);
 }


 public function orderDeliveries()
 {
     return $this->hasMany(OrderDelivery::class);
 }




}
