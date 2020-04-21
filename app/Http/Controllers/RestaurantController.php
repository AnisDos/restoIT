<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Meal;
use App\Product;
use App\Ingredient;
use App\Employee;
use App\Charge;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;
use DB;


use Image;
class RestaurantController extends Controller
{
    



    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed','isrestaurant']);
    }



    public function index()
    {
    
        return view('restaurant.home', );

    }

    


    public function addMeal()
    {
        
        $categories = Category::where('user_id',Auth::user()->id)->get();
        $products = Product::all();

        return view('restaurant.addMeal', compact('categories','products')  );

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
        

        return view('restaurant.addCategory', );

    }


    

    


    public function addCategoryForm() 
    {
        $data = request()->validate([
            'categoryName' => 'required',
       
        ]);

  

$me =   Auth::user()->categories()->create([
        
             'categoryName'=> $data['categoryName'] ,
        
         
             ]);
     
    
            
         return redirect()->back()->with("success"," Category added with success !");

    }




    
    public function mealsList()
    {
        
        $meals = Meal::all();

        return view('restaurant.mealsList', compact('meals')  );

    }


    


    public function mealDetails(Meal $meal)
    {
  

        return view('restaurant.mealDetails', compact('meal')  );

    }

    public function updateMeal(Meal $meal)
    {

        $ingredients = Ingredient::where('meal_id', $meal->id)->get();
      
        $categories = Category::where('user_id',Auth::user()->id)->get();
        $products = Product::all();

 
        return view('restaurant.updateMeal', compact('meal','categories','products','ingredients')  );

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

    public function addEmployee()
    {
        

        return view('employee.addEmployee',);

    }



    public function addEmployeeForm() 
    {
//dd(request());
      
        $data = request()->validate([
            'nameEmployee' => 'required',
            'email' => 'unique:employees',
            'password' => 'required|confirmed|min:5',
            'tel' => 'required',
            'type' => 'required',
            'price_ph' => 'required',
            'hWork' => 'required',
          
        ]);

        
        do
    {
        $token = Auth::user()->id;
        $tok= substr($data['type'], 0, -3);
        $idEmployee = 'RS'. $token . '-'. $tok  . '-'. strftime(time());
        $user_code = Employee::where('idEmployee', $idEmployee)->get();
    }
    while(!$user_code->isEmpty());

   

    $password = \Hash::make($data['password']);

  


    //dd($idEmployee,$password);

       Auth::user()->employees()->create([
        
            'idEmployee'=>  $idEmployee,
            'email'=> $data['email'] ,
            'nameEmployee'=> $data['nameEmployee'] ,
            'password'=> $password,
            'tel'=>  $data['tel'],
            'type'=>  $data['type'],
            'price_ph'=>  $data['price_ph'],
            'hWork'=>  $data['hWork'],
            
        
            ]);

         return redirect()->back()->with("success"," Employye added with success !");

    }


    
    public function employeeCharge()
    {
        $employees = Employee::where('user_id',Auth::user()->id)->get();
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


        return view('restaurant.employeeCharge',compact('employees'));

    }




    public function validatePayEmployee() 
    {
        
        
      
        $data = request()->validate([
            'id_employee' => 'required',
            'total' => 'required',
          
          
        ]);


        $charge = Auth::user()->charges()->create([
        
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

    //==========================================================================================================
    //=======================================================================================================
    public function addProvider()
    {
        

        return view('restaurant.addProvider',);

    }



    public function addProviderForm() 
    {

      
        $data = request()->validate([
            'email' => 'required',
            'tel' => 'required',
            'providerName' => 'required',
            'adresse' => 'required',
          
        ]);

        
       Auth::user()->providers()->create([
        
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
        

        return view('restaurant.addCaisse',);

    }



    public function addCaisseForm() 
    {

      
        $data = request()->validate([
            'caisseName' => 'required',
            'cacheInit' => 'required',
      
        ]);

  
       Auth::user()->Caisses()->create([
        
            'caisseName'=> $data['caisseName'] ,
            'cacheInit'=>  $data['cacheInit'],
            'total'=>  $data['cacheInit'],
            
        
            ]);

         return redirect()->back()->with("success"," Caisse added with success !");

    }


    
    




}
