<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Meal;
use App\User;

class Category extends Model
{
    protected $guarded =[];




    
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }


    
public function user()
{
    return $this->belongsTo(User::class);
}






}
