<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Ingridient;
use App\User;
use App\ProductVersion;

class Product extends Model
{
    protected $guarded =[];

    
public function ingredients()
  {
      return $this->hasMany(Ingredient::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  
 


  public function productVersions()
  {
      return $this->hasMany(ProductVersion::class);
  }

}
