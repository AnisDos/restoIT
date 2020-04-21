<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\category;
use App\Ingridient;
use App\OrderMeals;


class Meal extends Model
{
    protected $guarded =[];


    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function orderMeals()
    {
        return $this->hasMany(OrderMeals::class);
    }

  

}
