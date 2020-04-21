<?php

namespace App;
use App\User;
use App\DeliveryCompany;
use App\Employee;


use Illuminate\Database\Eloquent\Model;

class Charge extends Model
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


public function delivery_companies()
{
    return $this->belongsTo(DeliveryCompany::class);
}


}
