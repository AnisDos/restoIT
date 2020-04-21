<?php

namespace App;
use App\User;

use App\Employee;


use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    

    protected $guarded =[];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    



}
