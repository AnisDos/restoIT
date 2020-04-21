<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\User;



class Privilege extends Model
{

  
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }



public function user()
{
    return $this->belongsToMany(User::class);
}





}
