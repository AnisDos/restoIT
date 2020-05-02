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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;
use DB;
use App\TransactionHistory;

use App\mail\SendMail;


use Image;
class RestaurantController extends Controller
{
    



    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed','isrestaurant']);
    }


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

        
$productNoQnt = $this->productNoQntfunction();




    
        return view('restaurant.home', compact('productNoQnt') );

    }

    



    public function addVersionProduct()
    {
             
$productNoQnt = $this->productNoQntfunction();



       // $this->checkPrivilege(2);
               
            //$privileges = Auth::user()->privileges()->get();
      /*   $products = DB::select("select *  from products  LEFT JOIN product_versions ON product_versions.product_id = products.id
        where  products.user_id =  " . Auth::user()->user_id ." " );
         */
        //$products = Product::where('user_id',Auth::user()->id)->get();
        $products = Auth::user()->restaurant->products()->get();
        //$providers = Provider::where('user_id',Auth::user()->id)->get();
        $providers = Auth::user()->restaurant->providers()->get();
       
        return view('product.addVersionProduct', compact('products','providers','productNoQnt'));
    
    }





    
public function addVersionProductForm() 
{
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
    //$transactionHistory->employee()->associate(Auth::user());
    $transactionHistory->productVersion()->associate($version);
    $transactionHistory->save();

 

        
     return redirect()->back()->with("success"," Product added with success !! you can check it :)");

}
    







public function purchaseOrder(product $product){

if($product->user_id != Auth::user()->id){
    
    return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");
    
}

    $productNoQnt = $this->productNoQntfunction();

  
    $productWest = DB::table('product_versions')
    ->where('product_id',$product->id)
    ->sum('product_versions.qntSTK');
    

   // $providers = Provider::where('user_id',Auth::user()->id)->get();
    $providers = Auth::user()->restaurant->providers()->get();


    return view('restaurant.purchaseOrder', compact('product','productNoQnt','productWest','providers'));


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
        $productNoQnt = $this->productNoQntfunction();
        
        
        //$categories = Category::where('user_id',Auth::user()->id)->get();
        //$products = Product::all();

        $categories = Auth::user()->restaurant->categories()->get();
        $products = Auth::user()->restaurant->products()->get();
    

        return view('restaurant.addMeal', compact('categories','products' , 'productNoQnt')  );

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
            
      /*       $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
           
            $image->save(); */
           
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
        $productNoQnt = $this->productNoQntfunction();
        

        return view('restaurant.addCategory',compact('productNoQnt') );

    }


    

    


    public function addCategoryForm() 
    {
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
        $productNoQnt = $this->productNoQntfunction();
        
       // $meals = Meal::all();
       $meals =  DB::table('meals')
       ->select('meals.*')
       ->leftJoin('categories',  'categories.id', '=','meals.category_id')
       ->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
       ->where('restaurants.user_id', Auth::user()->id )
       ->get();


        return view('restaurant.mealsList', compact('meals','productNoQnt')  );

    }


    


    public function mealDetails(Meal $meal)
    {
  
        $productNoQnt = $this->productNoQntfunction();

        return view('restaurant.mealDetails', compact('meal','productNoQnt')  );

    }

    public function updateMeal(Meal $meal)
    {
        

        $productNoQnt = $this->productNoQntfunction();
        $ingredients = Ingredient::where('meal_id', $meal->id)->get();
      
      //  $categories = Category::where('user_id',Auth::user()->id)->get();
      //  $products = Product::all();

        
    $categories = Auth::user()->restaurant->categories()->get();
    $products = Auth::user()->restaurant->products()->get();

 
        return view('restaurant.updateMeal', compact('meal','categories','products','ingredients','productNoQnt')  );

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
            
          /*   $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
           
            $image->save();
            */
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

    public function addEmployee()
    {
        $productNoQnt = $this->productNoQntfunction();

        return view('employee.addEmployee',compact('productNoQnt'));

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
    {
        $productNoQnt = $this->productNoQntfunction();
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


        return view('restaurant.employeeCharge',compact('employees','productNoQnt'));

    }




    public function validatePayEmployee() 
    {
        
        
      
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
        {
            $productNoQnt = $this->productNoQntfunction();

          //  $employees = Auth::user()->employees()->get();
            
          $employees =Auth::user()->restaurant->employees()->get();

            return view('restaurant.allEmployee',compact('employees','productNoQnt'));
    
        }

        
       
        public function checkEmployeeByOne(Employee $employee)
        {
            $productNoQnt = $this->productNoQntfunction();

            if ($employee->restaurant_id != Auth::user()->restaurant->id) {
                return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");
    
            }

           $employeeAllCharges = Charge::where('restaurant_id',Auth::user()->restaurant->id)
                                 ->where('employee_id',$employee->id)
                                 ->where('type',"employee")
                                 ->get();
            
    
            return view('restaurant.checkEmployeeByOne',compact('employee','employeeAllCharges','productNoQnt'));
    
        }


        


        public function updateEmployyeInfo(){
            
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
    {
        
        $productNoQnt = $this->productNoQntfunction();

        return view('restaurant.addProvider',compact('productNoQnt'));

    }



    public function addProviderForm() 
    {

      
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
        $productNoQnt = $this->productNoQntfunction();
        

        return view('restaurant.addCaisse',compact('productNoQnt'));

    }



    public function addCaisseForm() 
    {

      
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
        
        $productNoQnt = $this->productNoQntfunction();

        return view('restaurant.addSupCharge',compact('productNoQnt'));

    }


    

    
    public function addSupChargeForm() 
    {

      
        $data = request()->validate([
            'priceCharge' => 'required',
            'note' => 'required',
            'image' => '',
      
        ]);

        
        if (request('image')){

            $imagePath = request('image')->store('charges','public');
            
           /*  $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
           
            $image->save(); */
           
        }

        if (request('image')){

            Auth::user()->charges()->create([
        
                'priceCharge'=> $data['priceCharge'] ,
                'note'=>  $data['note'],
                'image'=>  $imagePath,
               'type'=> "additional",
            
                ]);
    
            
          }else {
            Auth::user()->charges()->create([
        
                'priceCharge'=> $data['priceCharge'] ,
                'note'=>  $data['note'],
                'type'=> "additional",
               
            
                ]);
          }
  
    

         return redirect()->back()->with("success"," Charge added with success !");

    }




}
