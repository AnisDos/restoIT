<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Privilege;
use Carbon\Carbon;
use App\Key;
use App\Admin;

use App\Employee;
use Illuminate\Support\Facades\DB;


class superadminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','issuperadmin']);
    }



    public function index()
    {

        //partie chart===================================================================
//$chart = [];

$charts = array();

//hadi ndirha dm1
//$restaurants = User::where('is_admin',true)->where('id','!=',Auth::user()->id)->get();

$restaurants = Admin::all();
// feach all restaurant of this admin and try yo evry one put there name end revuen of year
foreach($restaurants as $restaurant){



    //$allrestaurants = User::where('user_id', $restaurant->id)->where('id','!=', $restaurant->id)->get();
    $allrestaurants = $restaurant->restaurants()->get();
    // feach all restaurant of this admin and try yo evry one put there name end revuen of year
   
    $mounthEvryRes = array(0,0,0,0,0,0,0,0,0,0,0,0);
    foreach($allrestaurants as $allrestaurant){


   
        $year = 2020;
        $tz = 'Europe/Madrid';
       
       $mounth = array();
        for ($i=1; $i <13 ; $i++) { 
        
       
        $order = DB::table('orders')
       /*    ->select('orders.*') */
        ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
        ->where('caisses.restaurant_id', $allrestaurant->id )
        ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
        ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
        ->sum('orders.priceOrder');
       
       
       
        array_push($mounth,  $order);
       
       
       
       }


         //for evry res of admin add resultat of evry mounth
       for ($j=0; $j <12 ; $j++) {
        $mounthEvryRes[$j] =  $mounthEvryRes[$j] + $mounth[$j];

        }
      // array_push($charts,  array( $restaurant->name,$mounth));



    }
    

    array_push($charts,  array( $restaurant->name,$mounthEvryRes));


 

}

//end partie charts===================================================================
//dd($charts[0][1],$order);
    
        return view('superadmin.home', compact('charts'));

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
            $users = DB::table('admins')
            ->select('admins.*','users.email')
            ->join('users', 'admins.user_id', '=', 'users.id')
            ->whereNotExists( function ($query)  {
                $query->select(DB::raw(1))
                ->from('keys')
                ->whereRaw('admins.id = keys.admin_id')
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
    
        return view('superadmin.generatekey',compact('users','keyValue','allprivileges') );

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
                
                
                             $restaurant = Admin::find($data['id_restaurant']);	
                
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
        $users = DB::table('admins')
        ->select('admins.*','users.email','keys.*')
        ->join('keys', 'admins.id', '=', 'keys.admin_id')
        ->join('users', 'admins.user_id', '=', 'users.id')
        /* ->Where('keys.date_experation', '>', Carbon::now()) */
        ->get();
    
        return view('superadmin.showRestaurantWithKey',compact('users') );

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
        $users = DB::table('admins')
        ->select('admins.*','users.email','keys.*')
        ->join('keys', 'admins.id', '=', 'keys.admin_id')
        ->join('users', 'admins.user_id', '=', 'users.id')
        /* ->Where('keys.date_experation', '>', Carbon::now()) */
        ->get();
        //dd($users);
    
        return view('superadmin.showRestaurantAllInfo',compact('users') );

    }


    

    public function showRestaurantAllInfoByOne(Admin $user)
    {

      /*   if (!$user->admin->exists()) {
            return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");

        }  */

/* 
      
            $someInfoEmployees = DB::table('employees')
            ->select('employees.*','us1.name','us1.is_admin')
            ->leftJoin('users as us1',  'us1.id', '=','employees.user_id')
            ->leftJoin('users as us2',  'us2.id', '=','us1.user_id')
            ->where('us2.id','!=', Auth::user()->id)
            ->where('us2.id', $user->id)
            ->get(); */


            
            $someInfoEmployees = DB::table('employees')
            ->select('employees.*','restaurants.name','users.email')
            ->rightJoin('users',  'users.id', '=','employees.user_id')
            ->leftJoin('restaurants',  'restaurants.id', '=','employees.restaurant_id')
            ->leftJoin('admins',  'admins.id', '=','restaurants.admin_id')
            ->where('admins.id', $user->id)
            ->get();
    
       
        //$restaurants =  User::where('user_id',$user->id)->get();
        $restaurants = $user->restaurants()->get();

   
        //dd($someInfoEmployees);
        return view('superadmin.showRestaurantAllInfoByOne',compact('user','someInfoEmployees','restaurants') );

    }







    




    public function showRevenu()
    {
        

        $revenus = array();
        $year = 2020;
        $tz = 'Europe/Madrid';
     
     $mounth = array();
        for ($i=1; $i <13 ; $i++) { 
        
     
        $order = DB::table('keys')
        ->where('keys.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
        ->where('keys.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
        ->sum('keys.priceKey');
     
     
     
        array_push($mounth,  $order);
     
        }

        
        array_push($revenus,  array( "revenus",$mounth));


        return view('superadmin.showRevenu',compact('revenus') );

    }




    public function showtotalecompte()
    {
        

        //totale compte
        //$totalcomptes = User::where('id','!=',Auth::user()->id)->where('is_admin',true)->count();
        $totalcomptes = Admin::count();
        //coumpte activi
       /*  $activcoupmtes = User::where('id','!=',Auth::user()->id)
                          ->where('is_admin',true)
                          ->where('verified',true)
                          ->count(); */
                          $activcoupmtes = Admin::
                          where('verified',true)
                          ->count();
        //compte deactive
        $deactuvcomptes = $totalcomptes -  $activcoupmtes;
        //compte never get key 
        $nokeycoupmtes =  DB::table('admins')
        ->whereNotExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('keys')
            ->whereRaw('admins.id = keys.admin_id');
        })
        ->count();
        //compte khlasetlhom abonnement
        $expirkeycoupmtes =  DB::table('admins')
        ->where('verified',false)
        ->whereExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('keys')
            ->whereRaw('admins.id = keys.admin_id');
        })
        ->count();

//dd($totalcomptes,$activcoupmtes,$nokeycoupmtes,$deactuvcomptes,$expirkeycoupmtes);
        return view('superadmin.showtotalecompte',compact('activcoupmtes','expirkeycoupmtes','nokeycoupmtes') );

    }





}
