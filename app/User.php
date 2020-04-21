<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Ingredient;
use App\Product;
use App\Employee;
use App\User;
use App\Category;
use App\Provider;
use App\Customer;
use App\DeliveryCompany;
use App\SuperAdmin;
use App\Privilege;
use App\Key;
use App\Charge;
use App\Caisse;
use App\Promo;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address' , 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




 
    
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
  
  
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
  
   
    

    
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
  
  
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
  

    
  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function categories()
  {
      return $this->hasMany(Category::class);
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


  public function superAdmin()
  {
      return $this->hasOne(SuperAdmin::class);
  }

  
    
  public function privileges()
  {
      return $this->belongsToMany(Privilege::class);
  }



     
  public function keys()
  {
      return $this->hasMany(Key::class);
  }


  
  public function charges()
  {
      return $this->hasMany(Charge::class);
  }


  
  
  public function caisses()
  {
      return $this->hasMany(Caisse::class);
  }

  public function promos()
  {
      return $this->hasMany(Promo::class);
  }



}
