<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Meal;
use App\Product;
use App\Ingredient;
use App\Employee;
use App\Charge;
use App\User;
use App\Provider;
use App\WeekProgram;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;
use DB;
use App\TransactionHistory;
use App\OrderMeals;
use App\mail\SendMail;

use Carbon\Carbon;


use Image;
class RestaurantController extends Controller
{
    



    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed','isrestaurant']);
    }


    // check if restaurants has privilage
public function checkPrivilege(String $name)
{
  
    $exists = Auth::user()->restaurant->admin->privileges->contains($name);

    return $exists;
    if (!$exists) {
       
        return redirect()->back();
    }

    return true;

}

//==================================================== ============================================



    public function productNoQntfunction(){
        
       // $products = Product::where('user_id',Auth::user()->id)->get();
        $products = Auth::user()->restaurant->products()->get();

$productNoQnt = array();
foreach($products as $product)
{
    
    $productWest = DB::table('product_versions')
    ->where('product_id',$product->id)
    ->sum('product_versions.qntSTK');
    

    if ($product->limiteSTK >= $productWest) {
   
        array_push($productNoQnt,  $product);

    }


}

//dd($productNoQnt);
return $productNoQnt;

    }


    public function index()
    {
        
//partie chart  revenus depenses===================================================================


$year = 2020;
$tz = 'Europe/Madrid';


$revenus = array();
   for ($i=1; $i <13 ; $i++) { 
   

   $order = DB::table('orders')
/*    ->select('orders.*') */
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.restaurant_id', Auth::user()->restaurant->id )
   ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('orders.priceOrder');



   array_push($revenus,  $order);



}

$depenses = array();
   for ($i=1; $i <13 ; $i++) { 
   

   $order = DB::table('charges')
/*    ->select('charges.*') */
   ->where('charges.restaurant_id', Auth::user()->restaurant->id )
   ->where('charges.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('charges.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('charges.priceCharge');



   array_push($depenses,  $order);



}


//end partie chart revenus depenses===================================================================
        //partie chart===================================================================
$charts = array();
$caisses = Auth::user()->restaurant->caisses()->get();
// feach all restaurant of this admin and try yo evry one put there name end revuen of year
foreach($caisses as $caisse){
   $year = 2020;
   $tz = 'Europe/Madrid';
$mounth = array();
   for ($i=1; $i <13 ; $i++) { 
   $order = DB::table('orders')
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.id', $caisse->id )
   ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('orders.priceOrder');
   array_push($mounth,  $order);
}
   array_push($charts,  array( $caisse->caisseName,$mounth));
}

//dd($charts);

//end partie charts===================================================================
      
        // total spent , total revenues , total customers , totals orders 

        $year = carbon::now()->year;
        $month = carbon::now()->month;
        $tz = 'Europe/Madrid';
        
        $totalspents = DB::table('charges')
        ->leftJoin('restaurants',  'restaurants.id', '=','charges.restaurant_id')
        ->where('restaurants.id',Auth::user()->restaurant->id)
        ->where('charges.created_at', '>=', Carbon::createFromDate($year, $month,0, $tz) )
        ->where('charges.created_at', '<',Carbon::createFromDate($year, $month+1,0, $tz) )
        ->sum('charges.priceCharge');


        $totalcustomers = Auth::user()->restaurant->customers()->count();
        $totalOrders =DB::table('orders')
        ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
        ->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
        ->where('restaurants.id',Auth::user()->restaurant->id)
        ->where('orders.created_at', '>=', Carbon::createFromDate($year, $month,0, $tz) )
        ->where('orders.created_at', '<',Carbon::createFromDate($year, $month+1,0, $tz) )
        ->count('*');


        $totalrevenues = DB::table('orders')
        ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
        ->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
        ->where('restaurants.id',Auth::user()->restaurant->id)
        ->where('orders.created_at', '>=', Carbon::createFromDate($year, $month,0, $tz) )
        ->where('orders.created_at', '<',Carbon::createFromDate($year, $month+1,0, $tz) )
        ->sum('orders.priceOrder');


//dd($totalOrders,$totalrevenues,$totalspents,$totalcustomers,$month);




        
//===================================================================
//===================================================================
$productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
//===================================================================
//===================================================================
//total orders , orderto delevry , order taklou hna , 



$localorders = array();
$deliveryorders = array();
$delevrycompanyorders = array();
$delevryboyorders = array();
$year = carbon::now()->year;
$tz = 'Europe/Madrid';

//$mounth = array();
for ($i=1; $i <13 ; $i++) { 


$order = DB::table('orders')
->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
->where('restaurants.id',Auth::user()->restaurant->id)
->where('orders.orderType',"local")
->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
->count('*');

array_push($localorders,  $order);




$order = DB::table('orders')
->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
->where('restaurants.id',Auth::user()->restaurant->id)
->where('orders.orderType',"delivery")
->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
->count('*');

array_push($deliveryorders,  $order);




$order = DB::table('orders')
->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
->where('restaurants.id',Auth::user()->restaurant->id)
->where('orders.orderType',"delevryCompany")
->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
->count('*');

array_push($delevrycompanyorders,  $order);





$order = DB::table('orders')
->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
->where('restaurants.id',Auth::user()->restaurant->id)
->where('orders.orderType',"delevryboy")
->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
->count('*');

array_push($delevryboyorders,  $order);

}


//array_push($totalOrders,  array($mounth));

//===================================================================
//===================================================================

//customers


//dd($localorders,$deliveryorders,$delevrycompanyorders,$delevryboyorders);
        return view('restaurant.home', compact('revenus','depenses','productNoQnt','privileges','localorders','deliveryorders','delevrycompanyorders','delevryboyorders','totalOrders' ,'totalrevenues', 'totalspents' ,'totalcustomers','charts'  ) );

    }

    



    public function addVersionProduct()
    {
             
$productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
$this->checkPrivilege("stocks");


       // $this->checkPrivilege(2);
               
            //$privileges = Auth::user()->privileges()->get();
      /*   $products = DB::select("select *  from products  LEFT JOIN product_versions ON product_versions.product_id = products.id
        where  products.user_id =  " . Auth::user()->user_id ." " );
         */
        //$products = Product::where('user_id',Auth::user()->id)->get();
        $products = Auth::user()->restaurant->products()->get();
        //$providers = Provider::where('user_id',Auth::user()->id)->get();
        $providers = Auth::user()->restaurant->providers()->get();
       
        return view('product.addVersionProduct', compact('products','providers','productNoQnt','privileges',));
    
    }





    
public function addVersionProductForm() 
{
    $this->checkPrivilege("stocks");
    $data = request()->validate([
        'id_product' => 'required',
        'qntSTK' => 'required',
        'price' => 'required',
        'return' => '',
        'date_experation_bool' => '',
        'date_experation' => '',
        'codebare' => 'required',
        'provider_id' => '',
      
    ]);

 

    if (empty($data['date_experation_bool'])){
        $date_experation_bool=false;
        
                }else {
                    $date_experation_bool=true;
                }


                if (empty($data['return'])){
                    $return=false;
                    
                            }else {
                                $return=true;
                            }         


              



    if ($date_experation_bool) {



        $me = Product::find($data['id_product']);

            $version = $me->productVersions()->create([
                
            'qntSTK'=>  $data['qntSTK'],
            'price'=>  $data['price'],
            'return'=>  $return,
            'date_experation_bool'=>  $date_experation_bool,
            'date_experation'=>  $data['date_experation'],
            'codebare'=>  $data['codebare'],
            ]);

            $provider = Provider::find($data['provider_id']);

            if ($provider) 
            { 
            $version->provider()->associate($provider);
            }

        
    }else{
        $me = Product::find($data['id_product']);


            $version = $me->productVersions()->create([
                
            'qntSTK'=>  $data['qntSTK'],
            'price'=>  $data['price'],
            'return'=>  $return,
            'date_experation_bool'=>  $date_experation_bool,
            'codebare'=>  $data['codebare'],
            ]);

            $provider = Provider::find($data['provider_id']);

            if ($provider) 
            { 
            $version->provider()->associate($provider);
            }


    }



    

      
    //registre the transation of this employee adding version 
         
    $transactionHistory = new TransactionHistory;
    $transactionHistory->qnt = $data['qntSTK'];
    $transactionHistory->type = "addnew";
    $transactionHistory->restaurant()->associate(Auth::user()->restaurant);
    $transactionHistory->productVersion()->associate($version);
    $transactionHistory->save();

 

    //add charge   mazalha f test

    $charge = new Charge;
    $charge->priceCharge = $data['price'];
    $charge->type = "stock";
    $charge->note = "restaurant added new version of product";
    //$charge->employee()->associate(Auth::user());
    $charge->restaurant()->associate(Auth::user()->restaurant);
    $charge->save();

        
     return redirect()->back()->with("success"," Product added with success !! you can check it :)");

}
    







public function purchaseOrder(product $product){

if($product->restaurant_id != Auth::user()->restaurant->id){
    
    return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");
    
}

    $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();

  
    $productWest = DB::table('product_versions')
    ->where('product_id',$product->id)
    ->sum('product_versions.qntSTK');
    

   // $providers = Provider::where('user_id',Auth::user()->id)->get();
    $providers = Auth::user()->restaurant->providers()->get();


    return view('restaurant.purchaseOrder', compact('product','productNoQnt','privileges','productWest','providers'));


}







public function mailsend() {
   
    $data = request()->validate([
        'provider_id' => '',
        'qntSTK' => 'required',
        'product_id' => '',
        'message' => ['required', 'string'],
          
    ]);


    $product = Product::find($data['product_id']);
    $provider = Provider::find($data['provider_id']);

    $message = " salam chikh  :" . $provider->providerName ." khesna produit :" . $product->productName . " o djibelna menou :" .$data['qntSTK'] . " ". $product->unity . " " . $data['message'];




    $details = [
        'email' => $provider->email,
        'title' =>"monque ta3 sel3a",
        'body' =>  $message
    ];
   
    \Mail::to( $provider->email)->send(new SendMail($details));
   
       
    return redirect()->back()->with("success"," Mail sended with success !");

}
























    public function addMeal()
    {
        $this->checkPrivilege("menus");
        $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
        
        
        //$categories = Category::where('user_id',Auth::user()->id)->get();
        //$products = Product::all();

        $categories = Auth::user()->restaurant->categories()->get();
        $products = Auth::user()->restaurant->products()->get();
    

        return view('restaurant.addMeal', compact('categories','products' , 'productNoQnt','privileges',)  );

    }


    

    


    public function addMealForm() 
    {
        $this->checkPrivilege("menus");
        $data = request()->validate([
            'mealName' => 'required',
            'category' => 'required',
            'price' => ['required', 'max:10'],
            'description' => 'required',
            'tax' => 'required',
            'image' => 'required',
            'var'=>  '',
        ]);

        //dd($data['var'][0][0]);
//$count=0;        
/* for($i = 0;  $i<=count($data['var'][0]);  $i++)
{
   $count= $count + 1;
}
 */
/* foreach($data['var'] as $i)
{
   $count= $count + 1;
} */
//$dataIngridient= preg_split("/[,]/",$data['var'][0]);

//dd($data['var'][0][1],$tags,$b);

        
        if (request('image')){

            $imagePath = request('image')->store('meals','public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
           
            $image->save();
           
        }

        $category = Category::find($data['category']);



$me =    $category->meals()->create([
        
             'mealName'=> $data['mealName'] ,
             'price'=>  $data['price'],
             'tax'=>  $data['tax'],
             'description'=>  $data['description'],
             'image'=>  $imagePath,
             
         
             ]);

             
         /*     $me->user()->associate(Auth::user());
             $me->save();
              */
         //put string geted from form too a array 
             $dataIngridient= preg_split("/[,]/",$data['var'][0]);
         
  

if (count($dataIngridient) > 1 ) {
   

    for($i = 0;  $i< count($dataIngridient) ;  $i++)
    {

       if($i % 2 == 0){ 

           $product = Product::find($dataIngridient[$i]);
           
           
           $ingredient = new Ingredient;
           $ingredient->qnt = $dataIngridient[$i+1];
           $ingredient->meal()->associate($me);
           $ingredient->product()->associate($product);
           $ingredient->save();


       }
                           
           
       

    }


}

          


     
            
         return redirect()->back()->with("success"," Meal added with success !");

    }





    public function addCategory()
    {
        $this->checkPrivilege("stocks");
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();

$allcategories = Auth::user()->restaurant->categories()->get();


        
$tz = 'Europe/Madrid';
$year = carbon::now()->year;

$categories = DB::table('categories')
->select('categories.*', DB::raw("COUNT(order_meals.meal_id) as nbrmeal")  )
->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
->leftJoin('meals',  'meals.category_id', '=','categories.id')
->leftJoin('order_meals',  'order_meals.meal_id', '=','meals.id')
->where('restaurants.id',Auth::user()->restaurant->id)
->where('order_meals.created_at', '>=', Carbon::createFromDate($year, 1,0, $tz) )
->where('order_meals.created_at', '<=',Carbon::createFromDate($year, 12,31, $tz) )
->groupBy('order_meals.meal_id')
->get();

//dd($categories);
        

        return view('restaurant.addCategory',compact('productNoQnt','privileges','categories','allcategories') );

    }


    

    


    public function addCategoryForm() 
    {$this->checkPrivilege("stocks");
        $data = request()->validate([
            'categoryName' => 'required',
       
        ]);

  

$me =   Auth::user()->restaurant->categories()->create([
        
             'categoryName'=> $data['categoryName'] ,
        
         
             ]);
     
    
            
         return redirect()->back()->with("success"," Category added with success !");

    }




    
    public function mealsList()
    {
        $this->checkPrivilege("menus");
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();
        
       // $meals = Meal::all();
    /*    $meals =  DB::table('meals')
       ->select('meals.*')
       ->leftJoin('categories',  'categories.id', '=','meals.category_id')
       ->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
       ->where('restaurants.user_id', Auth::user()->id )
       ->get(); */

       $meals =  DB::table('meals')
       //->select('meals.*', DB::raw('ingredients.qnt * product_versions.price AS priceOneIng') )
       ->select('meals.*', DB::raw("SUM(ingredients.qnt * product_versions.price) as priceMealIng") )
       ->leftJoin('categories',  'categories.id', '=','meals.category_id')
       ->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
       ->leftJoin('ingredients',  'ingredients.meal_id', '=','meals.id')
       ->leftJoin('products',  'products.id', '=','ingredients.product_id')
       ->leftJoin('product_versions',  'products.id', '=','product_versions.product_id')
       ->groupby('meals.id')
       ->where('restaurants.user_id', Auth::user()->id )
       ->get();



        return view('restaurant.mealsList', compact('meals','productNoQnt','privileges',)  );

    }


    


    public function mealDetails(Meal $meal)
    {
        if($meal->category->restaurant_id != Auth::user()->restaurant->id)
        {
            return redirect()->back()->with("danger","You can't do this action !! ");

        }
        
        $this->checkPrivilege("menus");
  
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();

        $totalOrders = OrderMeals::where('meal_id',$meal->id)->count('*');

        return view('restaurant.mealDetails', compact('meal','productNoQnt','privileges','totalOrders')  );

    }

    public function updateMeal(Meal $meal)
    {
        

        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();
        $ingredients = Ingredient::where('meal_id', $meal->id)->get();
      
      //  $categories = Category::where('user_id',Auth::user()->id)->get();
      //  $products = Product::all();

        
    $categories = Auth::user()->restaurant->categories()->get();
    $products = Auth::user()->restaurant->products()->get();

 
        return view('restaurant.updateMeal', compact('meal','categories','products','ingredients','productNoQnt','privileges',)  );

    }
    

    

    public function updateMealForm() 
    {$this->checkPrivilege("menus");
        $data = request()->validate([
            'mealName' => 'required',
            'category' => 'required',
            'price' => ['required', 'max:10'],
            'description' => 'required',
            'image' => '',
            'var'=>  '',
            'id_meal'=>'',
        ]);


        
        if (request('image')){

            $imagePath = request('image')->store('meals','public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
           
            $image->save();
           
        }

        $category = Category::find($data['category']);



        $me = Meal::where('id',  $data['id_meal'])->first();


             $me->mealName=  $data['mealName'] ;
             $me->price=  $data['price'] ;
             $me->description=  $data['description'] ;
             $me->category()->associate($category);
             
             $me->save();

        
             
         //put string geted from form too a array 
             $dataIngridient= preg_split("/[,]/",$data['var'][0]);


     //delete ingredient and recreate theme

    $t=  Ingredient::where('meal_id', $me->id)->delete();

  

         //create ingridients of meal
   
         
         if (count($dataIngridient) > 1 ) {
   

            for($i = 0;  $i< count($dataIngridient) ;  $i++)
            {
        
               if($i % 2 == 0){ 
        
                   $product = Product::find($dataIngridient[$i]);
                   
                   
                   $ingredient = new Ingredient;
                   $ingredient->qnt = $dataIngridient[$i+1];
                   $ingredient->meal()->associate($me);
                   $ingredient->product()->associate($product);
                   $ingredient->save();
        
        
               }
                                   
                   
               
        
            }
        
        
        }


     
            
         return redirect()->back()->with("success"," Meal updated with success !");

    }

    
    

    public function deactivateMeal(){


        $data = request()->validate([
            'meal_id' => 'required',
         
        ]);


        $meal = Meal::find($data['meal_id']);
        $meal->public = false;
        $meal->save();

         return redirect()->back()->with("success"," Meal Deactivated with success !");



    }



    public function activateMeal(){


        $data = request()->validate([
            'meal_id' => 'required',
         
        ]);


        $meal = Meal::find($data['meal_id']);
        $meal->public = true;
        $meal->save();

         return redirect()->back()->with("success"," Meal Activated with success !");



    }





  







    public function addEmployee()
    {$this->checkPrivilege("employee");
        $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();

        return view('employee.addEmployee',compact('productNoQnt','privileges',));

    }



    public function addEmployeeForm() 
    {

      
        $data = request()->validate([
            'nameEmployee' => 'required',
            'email' => 'unique:users',
            'password' => 'required|confirmed|min:5',
            'tel' => 'required',
            'type' => 'required',
            'price_ph' => 'required',
            'hWork' => 'required',
          
        ]);
  
        
        do
    {
        $token = Auth::user()->restaurant->id;
        $tok= substr($data['type'], 0, -3);
        $idEmployee = 'RS'. $token . '-'. $tok  . '-'. strftime(time());
        $user_code = Employee::where('idEmployee', $idEmployee)->get();
    }
    while(!$user_code->isEmpty());

   

    $password = \Hash::make($data['password']);

  


    //dd($idEmployee,$password);

    $compte = new User;
    $compte->email = $data['email'];
    $compte->password = $password;
    $compte->save();

      $employee = Auth::user()->restaurant->employees()->create([
        
            'idEmployee'=>  $idEmployee,
            'nameEmployee'=> $data['nameEmployee'] ,
            'tel'=>  $data['tel'],
            'type'=>  $data['type'],
            'price_ph'=>  $data['price_ph'],
            'hWork'=>  $data['hWork'],
            
        
            ]);
            $employee->user()->associate($compte);
            $employee->save();


         return redirect()->back()->with("success"," Employye added with success !");

    }


    
    public function employeeCharge()
    {$this->checkPrivilege("employee");
        $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
       // $employees = Employee::where('user_id',Auth::user()->id)->get();
        $employees =Auth::user()->restaurant->employees()->get();
  /*       $employees = DB::table('employees')
        ->select('employees.*',DB::raw('(employees.hWork*employees.price_ph) as total') , 'charges.created_at')
        ->whereExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('charges')
            ->whereRaw('employees.id = charges.employee_id')
            ->Where('created_at', Charge::max('created_at'));
        })
        ->orWhereNotExists(function ($query) {
            $query ->select(DB::raw(1))
            ->from('charges')
            ->whereRaw('employees.id = charges.employee_id');
        })
        ->get(); */

        //$employee->charges()->orderBy('created_at', 'DESC')->first()->created_at

        // dd($employees,Employee::find(1)->charges()->get(),);




        /* $someInfoEmployees = DB::table('employees')
        ->select('employees.*','us1.name','us1.is_admin')
        ->leftJoin('users as us1',  'us1.id', '=','employees.user_id')
        ->leftJoin('users as us2',  'us2.id', '=','us1.user_id')
        ->where('us2.id','!=', Auth::user()->id)
        ->where('us2.id', $user->id)
        ->get(); */


        return view('restaurant.employeeCharge',compact('employees','productNoQnt','privileges',));

    }




    public function validatePayEmployee() 
    {
        
        $this->checkPrivilege("employee");
      
        $data = request()->validate([
            'id_employee' => 'required',
            'total' => 'required',
          
          
        ]);


        $charge = Auth::user()->restaurant->charges()->create([
        
            'priceCharge'=> $data['total'] ,
            'type'=> 'employee' ,
           
            
        
            ]);
           $emp = Employee::find($data['id_employee']);
           $emp->hWork = 0;
           $emp->save();
            $charge->employee()->associate($emp);
            $charge->save();

            return redirect()->back()->with("success"," Employee payed with success !");

        }



        
        public function allEmployee()
        {$this->checkPrivilege("employee");
            $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();

          //  $employees = Auth::user()->employees()->get();
            
          $employees =Auth::user()->restaurant->employees()->get();

            return view('restaurant.allEmployee',compact('employees','productNoQnt','privileges',));
    
        }

        
       
        public function checkEmployeeByOne(Employee $employee)
        {$this->checkPrivilege("employee");
            $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();

            if ($employee->restaurant_id != Auth::user()->restaurant->id) {
                return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");
    
            }

           $employeeAllCharges = Charge::where('restaurant_id',Auth::user()->restaurant->id)
                                 ->where('employee_id',$employee->id)
                                 ->where('type',"employee")
                                 ->get();
            
    
            return view('restaurant.checkEmployeeByOne',compact('employee','employeeAllCharges','productNoQnt','privileges',));
    
        }


        


        public function updateEmployyeInfo(){
            $this->checkPrivilege("employee");
            $employee = Employee::find(request('id_emplo'));
            $em = User::find($employee->user_id);
           
            $data = request()->validate([
                'id_emplo'=> '',
                'nameEmployee' => 'required|min:3|max:50',
                'email' => ['required','email', \Illuminate\Validation\Rule::unique('users')->ignore($em->id)],
               // 'email'=>'',
                'tel'=>'required',
                'price_ph'=>'required',
                'type'=>'required',
            ]);
        
          
         
           
            $em->email = $data['email'];
            $em->save();
        
        
           // $employee = Employee::find($data['id_emplo']);
            //dd($employee,$data['id_res']);
            $employee->nameEmployee = $data['nameEmployee'];
            $employee->tel = $data['tel'];
            $employee->price_ph = $data['price_ph'];
            $employee->type = $data['type'];
        
     
            $employee->save();
        
            return redirect()->back()->with("success","employee information Updated with success !! ");
        
        
        }
        
        

public function updatePasswordEmployee()
{
    $this->checkPrivilege("employee");
    
    $data = request()->validate([
        'id_emplo'=> '',
        'Activate'=> '',
        'password' => 'confirmed|min:6',
       
    ]);

    $password = \Hash::make($data['password']);

    $employee = Employee::find($data['id_emplo']);
    $compte = User::find($employee->user_id);
    $compte->password = $password;
    $compte->save();
    if (request('Activate') == "activih"){$employee->active = true;}
    
    $employee->save();
    return redirect()->back()->with("success","employee Password Updated with success !! ");


}

public function decativateEmployee()
{
    $this->checkPrivilege("employee");
        
    $data = request()->validate([
        'id_emplo'=> 'required',

       
    ]);

    $password = "djit nkasi la routine";

    $employee = Employee::find($data['id_emplo']);
    $compte = User::find($employee->user_id);
    $compte->password = $password;
    $compte->save();

   $employee->active = false;
    
    $employee->save();
    return redirect()->back()->with("danger","Employee Blocked with success !! ");



}

    //==========================================================================================================
    //=======================================================================================================
    public function addProvider()
    {$this->checkPrivilege("providers");
        
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();
      

        return view('restaurant.addProvider',compact('productNoQnt','privileges',));

    }
    

    public function allProviders()
    {
        
        $this->checkPrivilege("providers");
        
        $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
$providers = Auth::user()->restaurant->providers()->get();

        return view('restaurant.allProviders',compact('productNoQnt','privileges','providers'));

    }

    public function addProviderForm() 
    {

        $this->checkPrivilege("providers");
        $data = request()->validate([
            'email' => 'required',
            'tel' => 'required',
            'providerName' => 'required',
            'adresse' => 'required',
          
        ]);

        
       Auth::user()->restaurant->providers()->create([
        
            'providerName'=> $data['providerName'] ,
            'email'=>  $data['email'],
            'tel'=>  $data['tel'],
            'adresse'=>  $data['adresse'],
            
        
            ]);

         return redirect()->back()->with("success"," Provider added with success !");

    }

    //==========================================================================================================
    //=======================================================================================================
    

    public function addCaisse()
    {
        $this->checkPrivilege("caisses");
        $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
        

        return view('restaurant.addCaisse',compact('productNoQnt','privileges',));

    }

    
    public function allCaisses()
    {
        $this->checkPrivilege("caisses");
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();
        $caisses = Auth::user()->restaurant->caisses()->get();
        

        return view('restaurant.allCaisses',compact('productNoQnt','privileges','caisses'));

    }
    public function addCaisseForm() 
    {

        $this->checkPrivilege("caisses");
        $data = request()->validate([
            'caisseName' => 'required',
            'cacheInit' => 'required',
      
        ]);

  
       Auth::user()->restaurant->Caisses()->create([
        
            'caisseName'=> $data['caisseName'] ,
            'cacheInit'=>  $data['cacheInit'],
            'total'=>  $data['cacheInit'],
            
        
            ]);

         return redirect()->back()->with("success"," Caisse added with success !");

    }


      //==========================================================================================================
    //=======================================================================================================
    
    public function addSupCharge()
    {
        $this->checkPrivilege("charges");
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();
        $charges =  Auth::user()->restaurant->charges()->get();

        return view('restaurant.addSupCharge',compact('productNoQnt','privileges','charges'));

    }


    

    
    public function addSupChargeForm() 
    {
        $this->checkPrivilege("charges");
      
        $data = request()->validate([
            'priceCharge' => 'required',
            'note' => 'required',
            'image' => '',
      
        ]);

        
        if (request('image')){

            $imagePath = request('image')->store('charges','public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
           
            $image->save();
           
        }

        if (request('image')){

            Auth::user()->restaurant->charges()->create([
        
                'priceCharge'=> $data['priceCharge'] ,
                'note'=>  $data['note'],
                'image'=>  $imagePath,
               'type'=> "additional",
            
                ]);
    
            
          }else {
            Auth::user()->restaurant->charges()->create([
        
                'priceCharge'=> $data['priceCharge'] ,
                'note'=>  $data['note'],
                'type'=> "additional",
               
            
                ]);
          }
  
    

         return redirect()->back()->with("success"," Charge added with success !");

    }



public function allCustomers()
{
    

$this->checkPrivilege("customers");
$productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();


$tz = 'Europe/Madrid';
$year = carbon::now()->year;
$month = carbon::now()->month;


$customers = DB::table('orders')
->select('customers.*', DB::raw("SUM(orders.priceOrder) as priceIng") )
->leftJoin('customers',  'customers.id', '=','orders.customer_id')
->leftJoin('restaurants',  'restaurants.id', '=','customers.restaurant_id')
->where('restaurants.id',Auth::user()->restaurant->id)
->where('orders.created_at', '>=', Carbon::createFromDate($year, $month,0, $tz) )
->where('orders.created_at', '<',Carbon::createFromDate($year, $month+1,0, $tz) )
->groupBy('orders.customer_id')
->get();

$allcustomers = Auth::user()->restaurant->customers()->get();



return view('restaurant.allCustomers',compact('allcustomers','customers','productNoQnt','privileges',));


}



public function weekProgram()
{
    $productNoQnt = $this->productNoQntfunction();
    $privileges = Auth::user()->restaurant->admin->privileges()->get();
    $weekPrograms = Auth::user()->restaurant->weekPrograms()->get();
    //get meals who doesnt exist in week Program
    $meals = DB::table('meals')
    ->select('meals.*')
    ->leftJoin('categories',  'categories.id', '=','meals.category_id')
    ->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
    ->where('restaurants.user_id', Auth::user()->id )
    ->whereNotExists(function($query)
                {
                    $query->select(DB::raw(1))
                          ->from('week_programs')
                          ->whereRaw('meals.id = week_programs.meal_id');
                })
    ->get();
   


return view('restaurant.weekProgram',compact('meals','weekPrograms','productNoQnt','privileges',));

}




public function weekProgramForm() 
{
    $data = request()->validate([
        'var' => 'required',
        
  
    ]);
   //put string geted from form too a array 
   $dataProgram= preg_split("/[,]/",$data['var'][0]);
         

$p=count($dataProgram)/8;
//fonction to split dataProgram to many list
$listlen = count($dataProgram);
$partlen = floor($listlen / $p);
$partrem = $listlen % $p;
$partition = array();
$mark = 0;
for($px = 0; $px < $p; $px ++) {
    $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
    $partition[$px] = array_slice($dataProgram, $mark, $incr);
    $mark += $incr;
}

// result is $partition

   // dd($data,$dataProgram,$partition,count($dataProgram)/8);


   foreach($partition as $week){


if ($week[0] != "") {
  

    if (WeekProgram::where('meal_id',  $week[0])->exists()) {
      //  dd('khayen');
        
     }else{
       
        $meal= Meal::find($week[0]);
        $weekProgram = new weekProgram;
        $weekProgram->saturday = $week[1];
        $weekProgram->sunday = $week[2];
        $weekProgram->monday = $week[3];
        $weekProgram->tuesday = $week[4];
        $weekProgram->wednesday = $week[5];
        $weekProgram->thursday = $week[6];
        $weekProgram->friday = $week[7];
        $weekProgram->restaurant()->associate(Auth::user()->restaurant);
        $weekProgram->meal()->associate($meal);
        $weekProgram->save();
     }

    }
     



   }


   
   return redirect()->back()->with("success"," week program added with success !");




}


public function updateOneWeekProgramForm()
{
    $data = request()->validate([
        'var' => 'required',
        'id_week_program' => 'required',
        
  
    ]);
   //put string geted from form too a array 
   $dataProgram= preg_split("/[,]/",$data['var'][0]);
         
 
   $weekpr= weekProgram::find($data['id_week_program']);
   $weekpr->saturday = $dataProgram[0];
   $weekpr->sunday = $dataProgram[1];
   $weekpr->monday = $dataProgram[2];
   $weekpr->tuesday = $dataProgram[3];
   $weekpr->wednesday = $dataProgram[4];
   $weekpr->thursday = $dataProgram[5];
   $weekpr->friday = $dataProgram[6];
   $weekpr->save();

   return redirect()->back()->with("success"," week program updated with success !");



}


public function deleteOneWeekProgramForm()
{
    $data = request()->validate([
  
        'id_week_program' => 'required',
        
  
    ]);

         
 
   $weekpr= weekProgram::find($data['id_week_program']);
   $weekpr->delete();

   return redirect()->back()->with("success"," week program deleted with success !");




}



public function stockEstimate()
{

    
$this->checkPrivilege("stocks");
$productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();

$meals = DB::table('meals')
->select('meals.*')
->leftJoin('categories',  'categories.id', '=','meals.category_id')
->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
->where('restaurants.user_id', Auth::user()->id )
->get();

return view('restaurant.stockEstimate',compact('productNoQnt','privileges','meals'));


}




public function estimationMealForm(){


    $this->checkPrivilege("stocks");
    $data = request()->validate([
  
        'meal_id' => 'required',
        
    ]);


  
    $meal = Meal::find($data['meal_id']);
    $ingredients = $meal->ingredients()->get();

 
    $toComparING = array();
    $toComparProd = array();
if (!$ingredients->isEmpty()) {


    foreach($ingredients as $ingredient){

        $product = DB::table('products')
        ->select('products.productName', DB::raw("SUM(product_versions.qntSTK) as qntSTKto"))
        ->leftJoin('product_versions',  'product_versions.product_id', '=','products.id')
        ->where('products.id', $ingredient->product_id )
        ->get();



        foreach($product as $pr){
            $prodname = $pr->productName;
            $qnt = $pr->qntSTKto;

        }



        
array_push($toComparProd,  array( $prodname, $qnt));


array_push($toComparING, array($prodname,$ingredient->qnt));
    }


    $compar = array();
    $manqueOfProd = array();

   
for($i = 0; $i < count($toComparProd) ; $i ++) {

    array_push($compar, (int) ($toComparProd[$i][1] / $toComparING[$i][1]) );

    if ( ((int) ($toComparProd[$i][1] / $toComparING[$i][1])) == 0  ) {
        array_push($manqueOfProd , $toComparProd[$i][0]  );
    }
 


}

  //  dd($toComparING,$toComparProd,$compar,$manqueOfProd,min($compar));

$opj = " ".min($compar);
  
    return redirect()->back()->with("manqueOfProd", $manqueOfProd )->with("nbrnbr", $opj )->with("mealSSid", " ".$meal->id );



}

return redirect()->back()->with("danger", "This product doesn't have ingredients" );


}


//=================================================================================================
//=================================================================================================
//=================================================================================================

public function addDeliveryCompany(){


    $this->checkPrivilege("deliveryCompany");
    $productNoQnt = $this->productNoQntfunction();
    $privileges = Auth::user()->restaurant->admin->privileges()->get();
    
    $deliveryCompanies = Auth::user()->restaurant->deliveryCompanies()->get();
    return view('restaurant.addDeliveryCompany',compact('productNoQnt','privileges','deliveryCompanies'));



}


public function addDeliveryCompanyForm()
{
    
    $this->checkPrivilege("deliveryCompany");
    $data = request()->validate([
        'deliveryCompaniesName' => 'required',
        'email' => 'email|required',
        'adresse' => 'required',
        'tel' => 'required',
        'percentage' => 'required',
  
    ]);


   Auth::user()->restaurant->deliveryCompanies()->create([
    
        'deliveryCompaniesName'=> $data['deliveryCompaniesName'] ,
        'email'=>  $data['email'],
        'adresse'=>  $data['adresse'],
        'tel'=> $data['tel'] ,
        'percentage'=> $data['percentage'] ,
        
    
        ]);

     return redirect()->back()->with("success"," Delivery Company added with success !");
}




public function liveOrders()
{
 
    $productNoQnt = $this->productNoQntfunction();
    $privileges = Auth::user()->restaurant->admin->privileges()->get();

    $orders = DB::table('orders')
   ->select('orders.*')
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.restaurant_id', Auth::user()->restaurant->id )
   ->where('orders.orderStatus',"completed" )
   ->get();

    
   return view('restaurant.liveOrders',compact('productNoQnt','privileges','orders'));


}


//======================================================================

public function historyTransactions()
{

    
    $productNoQnt = $this->productNoQntfunction();
    $privileges = Auth::user()->restaurant->admin->privileges()->get();

    $historyTransactions = Auth::user()->restaurant->transactionHistories()->get();

    
   return view('restaurant.historyTransactions',compact('productNoQnt','privileges','historyTransactions'));



}


}
