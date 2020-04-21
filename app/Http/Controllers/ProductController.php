<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductVersion;
use Illuminate\Support\Facades\Auth;
use App\Provider;

class ProductController extends Controller
{
    

    
    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed']);
    }


    public function addProduct()
    {
        
        $providers = Provider::where('user_id',Auth::user()->id)->get();

        return view('product.addProduct',compact('providers'));

    }


    

    public function addProductForm() 
    {
        $data = request()->validate([
            'productName' => 'required',
            'qntSTK' => 'required',
            'unity' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'return' => '',
            'date_experation_bool' => '',
            'date_experation' => '',
            'limiteSTK' => 'required',
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


                         //       dd('hgjhgjh',$date_experation_bool,$return);


    

        if ($date_experation_bool) {



            $me = Product::create([
        
                'productName'=> $data['productName'],
                'unity'=>  $data['unity'],
                'tax'=>  $data['tax'],
                'limiteSTK'=>  $data['limiteSTK'],
            
                ]);

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
            $me = Product::create([
        
                'productName'=> $data['productName'],
                'unity'=>  $data['unity'],
                'limiteSTK'=>  $data['limiteSTK'],
                'tax'=>  $data['tax'],
            
                ]);

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

   
    
          $me->user()->associate(Auth::user());
          $me->save();
     
    
            
         return redirect()->back()->with("success"," Product added with success !");

    }

    public function adminAddProduct()
    {
        
        $providers = Provider::where('user_id',Auth::user()->id)->get();

        return view('product.adminAddProduct',compact('providers'));

    }


    

 



}
