<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Privilege;
use App\TransactioHistory;
use App\Charge;
use App\User;
use App\Caisse;
use App\OrderDelivery;
    



class Employee extends Authenticatable
{

    //protected $guarded =[];
    use Notifiable;

    protected $guard = 'employee';

    protected $table = 'employees';

    protected $guarded =[];


    protected $hidden = ['password'];

    
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function privileges()
    {
        return $this->belongsToMany(Privilege::class);
    }

  
    
    public function transactioHistories()
    {
        return $this->hasMany(TransactioHistory::class);
    }

    
public function charges()
 {
     return $this->hasMany(Charge::class);
 }

 public function caisses()
 {
     return $this->hasMany(Caisse::class);
 }


 public function orderDeliveries()
 {
     return $this->hasMany(OrderDelivery::class);
 }


  

}
