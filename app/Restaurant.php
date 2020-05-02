<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Admin;
use App\Product;    
use App\Employee;
use App\Provider;
use App\DeliveryCompany;
use App\Charge;
use App\Caisse;

use App\Category;

use App\Customer;
    

class Restaurant extends Model
{
   
protected $guarded =[];
  
  public function user()
  {
      return $this->belongsTo(User::class);
  }



  public function admin()
  {
      return $this->belongsTo(Admin::class);
  }



  public function products()
    {
        return $this->hasMany(Product::class);
    }
  


public function employees()
{
    return $this->hasMany(Employee::class);
}



  public function providers()
  {
      return $this->hasMany(Provider::class);
  }



  public function customers()
  {
      return $this->hasMany(Customer::class);
  }


    

    
  public function deliveryCompanies()
  {
      return $this->hasMany(DeliveryCompany::class);
  }

 
    
    public function charges()
    {
        return $this->hasMany(Charge::class);
    }
  
  
    
    
    public function caisses()
    {
        return $this->hasMany(Caisse::class);
    }
  

 
    public function categories()
      {
          return $this->hasMany(Category::class);
      }
    
    

}