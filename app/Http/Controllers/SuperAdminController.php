<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Privilege;
use Carbon\Carbon;
use App\Key;
use App\Employee;
use Illuminate\Support\Facades\DB;


class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','issuperadmin']);
    }



    public function index()
    {
    
        return view('superAdmin.home', );

    }

    

    

    public function generatekey()
    {  //test get restaurant who dont have key valid
//======================================end test===============================================
        /* $users = DB::table('users')
            ->where(function ($query) {
                $query ->leftJoin('keys', 'users.id', '=', 'keys.user_id')
                ->select('users.*')
                ->where('users.id','!=', Auth::user()->id)
                ->where('users.is_admin', true)
                ->Where('keys.date_experation', '<', Carbon::now());
            })
            ->orWhere(function ($query) {
                $query->leftJoin('keys', 'users.id', '=', 'keys.user_id')
                ->select('users.*')
                ->where('users.id','!=', 'keys.user_id');
            })
            ->get(); */

//======================================end test===============================================
            $users = DB::table('users')
            ->where('users.is_admin', true)
            ->where('users.id','!=', Auth::user()->id)
            ->whereNotExists( function ($query)  {
                $query->select(DB::raw(1))
                ->from('keys')
                ->whereRaw('users.id = keys.user_id')
                ->Where('keys.date_experation', '>', Carbon::now());
            })
       /*      ->orWhereExists(function ($query) {
                $query ->select(DB::raw(1))
                ->from('keys')
                ->whereRaw('users.id = keys.user_id')
                ->Where('keys.date_experation', '<', Carbon::now());
            }) */
            ->get();
        $allprivileges = Privilege::all();

        //$users = User::where('id','!=', Auth::user()->id)->where('is_admin', true)->get();
        $keyValue = "" ;
    
        return view('superAdmin.generatekey',compact('users','keyValue','allprivileges') );

    }



    public function generatekeyform() 
    {
       
        $data = request()->validate([
            'id_restaurant' => 'required',
            'typeAb' => 'required',
            'priceKey'=> 'required',
            'var'=>  '',
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
                
                
                             $restaurant = User::find($data['id_restaurant']);	
                
                     //delete restaurant privilege and recreate theme
                
                     $restaurant->privileges()->detach();
                  
                     
                         //create restaurant privilege of meal
                   
                
                         if ($stack[0] != "" ) {
                   
                           
                            $restaurant->privileges()->attach($stack);
                
                        
                        
                        }
//generate key 
                        do
                        {
                            
                            $random_string = md5(microtime());
                            $token = $restaurant->id;
                            $random_string= substr($random_string, 0, -12);
                            $tok= substr($restaurant->name, 0, -3);
                            //delete espase
                            $tok = str_replace(' ', '', $tok);
                            $restaurant_key = $random_string . $token . '-'. $tok  . '-'. strftime(time());
                            $user_code = Key::where('restaurant_key', $restaurant_key)->get();
                        }
                        while(!$user_code->isEmpty());

                        $mounth = 0;
                        if ($data['typeAb'] == "3") {
                            $mounth = 3;
                        } else {
                            if ($data['typeAb'] == "6") {
                                $mounth = 6;
                            } else {
                                $mounth = 12;
                            }
                            
                           
                        }
                        
                        $date_experation = Carbon::now()->addMonths($mounth);

      

        $restaurant->keys()->create([
            
            'restaurant_key'=>  $restaurant_key,
            'priceKey'=>  $data['priceKey'],
            'date_experation'=>  $date_experation,
            
        ]);
                

        return redirect()->back()->with("success"," key added to Restaurant with success !");

    }


    

    public function showRestaurantWithKey()
    {
        //$users = User::all();
        $users = DB::table('users')
        ->join('keys', 'users.id', '=', 'keys.user_id')
        ->where('users.id','!=', Auth::user()->id)
        ->where('users.is_admin', true)
        /* ->Where('keys.date_experation', '>', Carbon::now()) */
        ->get();
    
        return view('superAdmin.showRestaurantWithKey',compact('users') );

    }

    
    public function showRestaurantAllInfo()
    {
        //$users = User::all();
       /*  $users = DB::table('users')
        ->join('keys',  'keys.user_id', '=','users.id')
        ->where('users.id','!=', Auth::user()->id)
        ->where('users.is_admin', true)
        ->groupBy('users.id')
        ->get(); */
        $users = DB::table('users')
        ->join('keys', 'users.id', '=', 'keys.user_id')
        ->where('users.id','!=', Auth::user()->id)
        ->where('users.is_admin', true)
        /* ->Where('keys.date_experation', '>', Carbon::now()) */
        ->get();
        //dd($users);
    
        return view('superAdmin.showRestaurantAllInfo',compact('users') );

    }


    

    public function showRestaurantAllInfoByOne(User $user)
    {

        if (!$user->is_admin) {
            return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");

        } else {
            if ($user->id == Auth::user()->id ) {
                return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");

            }
         
        }


      
            $someInfoEmployees = DB::table('employees')
            ->select('employees.*','us1.name','us1.is_admin')
            ->leftJoin('users as us1',  'us1.id', '=','employees.user_id')
            ->leftJoin('users as us2',  'us2.id', '=','us1.user_id')
            ->where('us2.id','!=', Auth::user()->id)
            ->where('us2.id', $user->id)
            ->get();
    
       
        $restaurants =  User::where('user_id',$user->id)->get();

   
        //dd($someInfoEmployees);
        return view('superAdmin.showRestaurantAllInfoByOne',compact('user','someInfoEmployees','restaurants') );

    }



}
