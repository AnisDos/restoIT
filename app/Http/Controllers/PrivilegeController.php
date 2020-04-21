<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Privilege;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\Auth;

class PrivilegeController extends Controller
{
    

    
    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed']);
    }


    public function addPrivilegeToUser()
    {
        
     
        $employees = Employee::where('user_id', Auth::user()->id)->get();

        return view('privilege.addPrivilegeToUser', compact('employees'));

    }


    

    public function addPrivilegeToUserFormForUpdate(Employee $employee) 
    {     
        
        //$allprivileges = Privilege::all();
        if (Auth::user()->is_admin) {
            
        $allprivileges = Auth::user()->privileges()->get();
        }else {
            $us = User::find(Auth::user()->user_id);
            $allprivileges = $us->privileges()->get();
        }
        $privileges = $employee->privileges;
        $olkl = Employee::where('user_id',Auth::user()->id)->where('id',$employee->id)->exists();
        if ($olkl) {
            return view('privilege.addPrivilegeToUserFormForUpdate', compact('employee','privileges','allprivileges'));

        } else {
               
return redirect()->back()->with("danger"," please don't play with that !!! Do your job seriously");

        }
        
        
     
    }


    

    public function updatePrivilege() 
    {  
        $data = request()->validate([
            
            'var'=>  '',
            'id_employee'=>'',
        ]);


             
         //put string geted from form too a array 
             $dataprivileges= preg_split("/[,]/",$data['var'][0]);


     

$stack = array();

for ($i=0; $i < count($dataprivileges) ; $i++) { 

    if(!in_array($dataprivileges[$i], $stack))
{
  
    array_push($stack, $dataprivileges[$i]);

}

}


             $employee = Employee::find($data['id_employee']);	

     //delete employee privilege and recreate theme

     $employee->privileges()->detach();
  
     
         //create employee privilege of meal
   

         if ($stack[0] != "" ) {
   
           
            $employee->privileges()->attach($stack);

        
        
        }


     
            
         return redirect()->back()->with("success"," employee privileges updated with success !");

    }


}
