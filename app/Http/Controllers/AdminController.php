<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
//use Image;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Meal;
use App\Product;
use App\Ingredient;
use Illuminate\Support\Arr;

use App\Restaurant;
use DB;
use Carbon\Carbon;


//require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    

    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed']);
    }






    public function index()
    {

//partie chart===================================================================
//$chart = [];

$charts = array();


//$restaurants = User::where('user_id',Auth::user()->id)->where('id','!=',Auth::user()->id)->get();
$restaurants = Auth::user()->admin->restaurants()->get();
//dd($restaurants);
// feach all restaurant of this admin and try yo evry one put there name end revuen of year
foreach($restaurants as $restaurant){

  
   $year = 2020;
   $tz = 'Europe/Madrid';

$mounth = array();
   for ($i=1; $i <13 ; $i++) { 
   

   $order = DB::table('orders')
/*    ->select('orders.*') */
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.restaurant_id', $restaurant->id )
   ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('orders.priceOrder');



   array_push($mounth,  $order);



}


   array_push($charts,  array( $restaurant->name,$mounth));

}

//end partie charts===================================================================
//dd($charts[0][1],$order);

        

        return view('admin.home',compact('charts') );

    }
 //=======================================================================================================
 //=======================================================================================================
 //=======================================================================================================
 //=======================================================================================================   
    public function addRestaurant()
    {
      /*   $meals = Meal::find(1);
        
        $oldingredients = $meals->ingredients()->get();
        dd($oldingredients);

        $meals = DB::table('meals')
        ->select('meals.*','categories.categoryName')
        ->leftJoin('categories',  'categories.id', '=','meals.category_id')
        ->leftJoin('users',  'users.id', '=','categories.user_id')
        ->where('users.id', 2)
        ->get();
      
      foreach($meals as $meal){
      
              $oldingredients = $meal->ingredients()->get();
              dd($oldingredients);
      }    */   
     
        return view('admin.addRestaurant', );

    }
    

    public function addRestaurantFormValidation()
{
   
    $data = request()->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'unique:users',
        'password' => 'required|confirmed|min:6',
        'address'=>'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

  
    
    if (request('image') != null){
     
        $imagePath = request('image')->store('users','public');
        dd($imagePath,request('image'));
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
        
       
        $image->save();



        
       
    }

$password = \Hash::make($data['password']);


$compte = new User;
$compte->email = $data['email'];
$compte->password = $password;
$compte->save();
    //registre that employee delete version of product of this employee
    $restaurant = new Restaurant;
    $restaurant->name = $data['name'];
    $restaurant->address = $data['address'];
  /*   $restaurant->email = $data['email'];
    $restaurant->password = $password; */
    if (request('image') != null){$restaurant->image = $imagePath;}
    
    $restaurant->admin()->associate(Auth::user());
    $restaurant->user()->associate($compte);
    $restaurant->save();

    //assign menus to new restaurant=============================================================================

    $categories = Auth::user()->admin->categories()->get();
   
  //  $categories = Category::where('user_id', Auth::user()->id)->get();
    $arrayReferencescatOldNew = array();
    foreach($categories as $category){

       $cat = $restaurant->categories()->create([
    
            'categoryName'=> $category->categoryName ,
           
            ]);

            // add in array key of category admin references to category restaurant
            
            $arrayReferencescatOldNew[$category->id] = $cat->id;
            
    

    }

    //dd($array);
//=======================================================================================================
// add product 

//nb: s3iba
//add only product not version productcuz evry restaurant have his own stock
//$products = Product::where('user_id',Auth::user()->id)->get();
$products = Auth::user()->admin->products()->get();
$arrayReferencesProductOldNew = array();
foreach($products as $product){

    
    $me = Product::create([
        
        'productName'=> $product->productName ,
        'unity'=>  $product->unity ,
        'limiteSTK'=> $product->limiteSTK ,
    
        ]);

        $me->restaurant()->associate($restaurant);
        $me->save();

        $arrayReferencesProductOldNew[$product->id] = $me->id;
            
    
   
          }


//=======================================================================================================

// add meals

//$meals = Meal::where('user_id',Auth::user()->id)->get();
//$meals == Auth::user()->categories()->meals();
  // $meals = Auth::user()->categories()->meals()->get();
         
  $meals =  DB::table('meals')
  ->select('meals.*')
  ->leftJoin('categories',  'categories.id', '=','meals.category_id')
  ->leftJoin('admins',  'admins.id', '=','categories.admin_id')
  ->where('admins.user_id', Auth::user()->id )
  ->get();

foreach($meals as $mealee){

    $meal = Meal::find($mealee->id);

    $category = Category::where('id',$arrayReferencescatOldNew[$meal->category_id])->first();
    $newmeal =    $category->meals()->create([
        
        'mealName'=> $meal->mealName ,
        'price'=>  $meal->price ,
        'description'=>  $meal->description ,
        'image'=>   $meal->image ,
        
    
        ]);

     /*    
        $newmeal->user()->associate($restaurant);
        $newmeal->save();

 */


        $oldingredients = $meal->ingredients()->get();


        foreach($oldingredients as $oldingredient){ 


        
            $product = Product::find($arrayReferencesProductOldNew[$oldingredient->product_id]);
           
           
            $ingredient = new Ingredient;
            $ingredient->qnt = $oldingredient->qnt;
            $ingredient->meal()->associate($newmeal);
            $ingredient->product()->associate($product);
            $ingredient->save();
    
    



        }



}

 
     
            
    return redirect()->back()->with("success","restaurant added with success !! Make some delicious food :)");

}


public function restaurantsList()
{

   // $restaurants= User::where('user_id',Auth::user()->id)->get();
    $restaurants= Auth::user()->admin->restaurants()->get();
    

    return view('admin.restaurantsList', compact('restaurants') );

}



public function restaurantDetails(User $restaurant)
{
 
    if ($restaurant->user_id != Auth::user()->id) {
        return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");
    }
 
$someInfoEmployees = $restaurant->employees()->get();


//partie chart===================================================================


$year = 2020;
$tz = 'Europe/Madrid';


$revenus = array();
   for ($i=1; $i <13 ; $i++) { 
   

   $order = DB::table('orders')
/*    ->select('orders.*') */
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.user_id', $restaurant->id )
   ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('orders.priceOrder');



   array_push($revenus,  $order);



}

$depenses = array();
   for ($i=1; $i <13 ; $i++) { 
   

   $order = DB::table('charges')
/*    ->select('charges.*') */
   ->where('charges.user_id', $restaurant->id )
   ->where('charges.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('charges.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('charges.priceCharge');



   array_push($depenses,  $order);



}


//end partie chart===================================================================

//dd($revenus,$depenses);

    return view('admin.restaurantDetails', compact('restaurant','someInfoEmployees','revenus','depenses') );
  

}





public function updateRestaurantInfo(){
    //$em = User::find('')
   
    $data = request()->validate([
        'id_res'=> '',
        'name' => 'required|min:3|max:50',
        //'email' => 'unique:users'.request()['email'],
       // 'email'=>'',
       'email' => ['required','email', \Illuminate\Validation\Rule::unique('users')->ignore(request()['id_res'])],
       // 'password' => 'confirmed|min:6',
        'address'=>'required',
        'image' => '',
    ]);

  
 
    if (request('image') != null){
      
        $imagePath = request('image')->store('users','public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
       
        $image->save();
       
    }
  



    $restaurant = User::find($data['id_res']);
    //dd($restaurant,$data['id_res']);
    $restaurant->name = $data['name'];
    $restaurant->address = $data['address'];
    $restaurant->email = $data['email'];
    if (request('image') != null){$restaurant->image = $imagePath;}
    
    $restaurant->save();

    return redirect()->back()->with("success","restaurant information Updated with success !! ");


}


public function updatePasswordRestaurant()
{

    
    $data = request()->validate([
        'id_res'=> '',
        'Activate'=> '',
        'password' => 'confirmed|min:6',
       
    ]);

    $password = \Hash::make($data['password']);

    $restaurant = User::find($data['id_res']);
    $restaurant->password = $password;

    if (request('Activate') == "activih"){$restaurant->active = true;}
    
    $restaurant->save();
    return redirect()->back()->with("success","restaurant Password Updated with success !! ");


}

public function decativateRestaurant()
{

        
    $data = request()->validate([
        'id_res'=> '',

       
    ]);

    $password = "djit nkasi la routine";

    $restaurant = User::find($data['id_res']);
    $restaurant->password = $password;

   $restaurant->active = false;
    
    $restaurant->save();
    return redirect()->back()->with("danger","restaurant Blocked with success !! ");



}

//==========================================================================================================


public function addMeal()
{
    
    //$categories = Category::where('user_id',Auth::user()->id)->get();
    //$products = Product::all();

    $categories = Auth::user()->admin->categories()->get();
    $products = Auth::user()->admin->products()->get();

    return view('admin.addMeal', compact('categories','products')  );

}







public function addMealForm() 
{
    $data = request()->validate([
        'mealName' => 'required',
        'category' => 'required',
        'price' => ['required', 'max:10'],
        'description' => 'required',
        'tax' => 'required',
        'image' => 'required',
        'var'=>  '',
    ]);

 
    
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

         
      /*    $me->user()->associate(Auth::user());
         $me->save(); */
         
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
    

    return view('admin.addCategory', );

}







public function addCategoryForm() 
{
    $data = request()->validate([
        'categoryName' => 'required',
   
    ]);



$me =    Auth::user()->admin->categories()->create([
    
         'categoryName'=> $data['categoryName'] ,
    
     
         ]);
 

        
     return redirect()->back()->with("success"," Category added with success !");

}





public function mealsList()
{
    
    //$meals = Meal::all();
   // $meals = Auth::user()->admin->categories()->meals()->get();
    $meals = DB::table('meals')
       ->select('meals.*')
       ->leftJoin('categories',  'categories.id', '=','meals.category_id')
       ->leftJoin('admins',  'admins.id', '=','categories.admin_id')
       ->where('admins.user_id', Auth::user()->id )
       ->get();

    //dd($meals);
    return view('admin.mealsList', compact('meals')  );

}





public function mealDetails(Meal $meal)
{


    return view('admin.mealDetails', compact('meal')  );

}

public function updateMeal(Meal $meal)
{

    $ingredients = Ingredient::where('meal_id', $meal->id)->get();
    $categories = Auth::user()->admin->categories()->get();
    //$categories = Category::where('user_id',Auth::user()->id)->get();
   // $products = Product::all();
    $products = Auth::user()->admin->products()->get();

    return view('admin.updateMeal', compact('meal','categories','products','ingredients')  );

}




public function updateMealForm() 
{
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



//==============================================================================================
//==============================================================================================
//==============================================================================================
//==============================================================================================
//==============================================================================================
//==============================================================================================





public function chartTotalOrders()
{



    return view('admin.chartTotalOrders',   );

}





}
