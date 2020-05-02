<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', function () {
    return redirect('home');
});
Route::get('/notVerified', function () {
    return view('pages.notVerified');
});
Route::get('/notVerifiedRestaurant', function () {
    return view('pages.notVerifiedRestaurant');
});
Route::get('/notVerifiedForEmployee', function () {
    return view('pages.notVerifiedForEmployee');
});



//super Admin

Route::get('/superadmin',   'SuperAdminController@index')->middleware('issuperadmin');
Route::get('/superadmin/generatekey',   'SuperAdminController@generatekey')->middleware('issuperadmin');
Route::post('/superadmin/generatekeyform',   'SuperAdminController@generatekeyform')->middleware('issuperadmin');
Route::get('/superadmin/showRestaurantWithKey',   'SuperAdminController@showRestaurantWithKey')->middleware('issuperadmin');
Route::get('/superadmin/showRestaurantAllInfo',   'SuperAdminController@showRestaurantAllInfo')->middleware('issuperadmin');
Route::get('/superadmin/showRestaurantAllInfoByOne/{user}',   'SuperAdminController@showRestaurantAllInfoByOne')->middleware('issuperadmin');
Route::get('/superadmin/showRevenu',   'SuperAdminController@showRevenu')->middleware('issuperadmin');
Route::get('/superadmin/showtotalecompte',   'SuperAdminController@showtotalecompte')->middleware('issuperadmin');



// admin route

Route::get('/admin',   'AdminController@index')->middleware('isadmin');
Route::get('/admin/addRestaurant',   'AdminController@addRestaurant')->middleware('isadmin');
Route::post('/admin/addRestaurantFormValidation',   'AdminController@addRestaurantFormValidation')->middleware('isadmin');
Route::get('/admin/restaurantsList',   'AdminController@restaurantsList')->middleware('isadmin');
Route::get('/admin/restaurantDetails/{restaurant}',   'AdminController@restaurantDetails')->middleware('isadmin');
Route::post('/admin/updateRestaurantInfo',   'AdminController@updateRestaurantInfo')->middleware('isadmin');
Route::post('/admin/updatePasswordRestaurant',   'AdminController@updatePasswordRestaurant')->middleware('isadmin');
Route::post('/admin/decativateRestaurant',   'AdminController@decativateRestaurant')->middleware('isadmin');



// admin meal route
Route::get('/admin/addMeal','AdminController@addMeal')->middleware('isadmin');
Route::post('/admin/addMealForm','AdminController@addMealForm')->middleware('isadmin');
Route::get('/admin/mealsList','AdminController@mealsList')->middleware('isadmin');
Route::get('/admin/mealDetails/{meal}','AdminController@mealDetails')->middleware('isadmin');
Route::get('/admin/updateMeal/{meal}','AdminController@updateMeal')->middleware('isadmin');
Route::post('/admin/updateMealForm','AdminController@updateMealForm')->middleware('isadmin');
Route::get('/admin/addCategory','AdminController@addCategory')->middleware('isadmin');
Route::post('/admin/addCategoryForm','AdminController@addCategoryForm')->middleware('isadmin');
//admin product

Route::get('/admin/addProduct','ProductController@adminAddProduct')->middleware('isadmin');
Route::post('/admin/addProductForm','ProductController@adminaddProductForm')->middleware('isadmin');


Route::post('/admin/chekKeyForm','KeyController@chekKeyForm');

//admin chart



Route::get('/admin/chartTotalOrders','AdminController@chartTotalOrders')->middleware('isadmin');













// restaurant route
Route::get('/restaurant', 'RestaurantController@index')->middleware('isrestaurant');

Route::get('/restaurant/addCategory','RestaurantController@addCategory')->middleware('isrestaurant');
Route::post('/restaurant/addCategoryForm','RestaurantController@addCategoryForm')->middleware('isrestaurant');




//restaurant meal route
Route::get('/restaurant/addMeal','RestaurantController@addMeal')->middleware('isrestaurant');
Route::post('/restaurant/addMealForm','RestaurantController@addMealForm')->middleware('isrestaurant');
Route::get('/restaurant/mealsList','RestaurantController@mealsList')->middleware('isrestaurant');
Route::get('/restaurant/mealDetails/{meal}','RestaurantController@mealDetails')->middleware('isrestaurant');
Route::get('/restaurant/updateMeal/{meal}','RestaurantController@updateMeal')->middleware('isrestaurant');
Route::post('/restaurant/updateMealForm','RestaurantController@updateMealForm')->middleware('isrestaurant');



//restaurant product

Route::get('/restaurant/addProduct','ProductController@addProduct')->middleware('isrestaurant');
Route::post('/restaurant/addProductForm','ProductController@addProductForm')->middleware('isrestaurant');
Route::get('/restaurant/addVersionProduct','RestaurantController@addVersionProduct')->middleware('isrestaurant');
Route::post('/restaurant/addVersionProductForm','RestaurantController@addVersionProductForm')->middleware('isrestaurant');
Route::get('/restaurant/purchaseOrder/{product}','RestaurantController@purchaseOrder')->middleware('isrestaurant');


//mail to provider
Route::post('/restaurant/send_mail', 'RestaurantController@mailsend')->middleware('isrestaurant');

//privilege

Route::get('/restaurant/addPrivilegeToUser','PrivilegeController@addPrivilegeToUser')->middleware('isrestaurant');
Route::get('/restaurant/addPrivilegeToUserFormForUpdate/{employee}','PrivilegeController@addPrivilegeToUserFormForUpdate')->middleware('isrestaurant');
Route::post('/restaurant/updatePrivilege','PrivilegeController@updatePrivilege')->middleware('isrestaurant');


//Provider

Route::get('/restaurant/addProvider','RestaurantController@addProvider')->middleware('isrestaurant');
Route::post('/restaurant/addProviderForm','RestaurantController@addProviderForm')->middleware('isrestaurant');


//employee
Route::get('/restaurant/addEmployee','RestaurantController@addEmployee')->middleware('isrestaurant');
Route::post('/restaurant/addEmployeeForm','RestaurantController@addEmployeeForm')->middleware('isrestaurant');
Route::get('/restaurant/employeeCharge','RestaurantController@employeeCharge')->middleware('isrestaurant');
Route::post('/restaurant/validatePayEmployee','RestaurantController@validatePayEmployee')->middleware('isrestaurant');
Route::get('/restaurant/allEmployee','RestaurantController@allEmployee')->middleware('isrestaurant');
Route::get('/restaurant/checkEmployeeByOne/{employee}','RestaurantController@checkEmployeeByOne')->middleware('isrestaurant');
Route::post('/restaurant/updateEmployyeInfo','RestaurantController@updateEmployyeInfo')->middleware('isrestaurant');
Route::post('/restaurant/updatePasswordEmployee',   'RestaurantController@updatePasswordEmployee')->middleware('isrestaurant');
Route::post('/restaurant/decativateEmployee',   'RestaurantController@decativateEmployee')->middleware('isrestaurant');



//Caisse
Route::get('/restaurant/addCaisse','RestaurantController@addCaisse')->middleware('isrestaurant');
Route::post('/restaurant/addCaisseForm','RestaurantController@addCaisseForm')->middleware('isrestaurant');


//charge
Route::get('/restaurant/addSupCharge','RestaurantController@addSupCharge')->middleware('isrestaurant');
Route::post('/restaurant/addSupChargeForm','RestaurantController@addSupChargeForm')->middleware('isrestaurant');





// employee route

//Route::group(['prefix'=>'employee', 'middleware' => 'isemployee'], function(){


/* Route::get('/login','AuthEmployee\LoginController@showLoginForm')->name('employee.login');
Route::post('/login','AuthEmployee\LoginController@login')->name('employee.login.submit'); */




Route::get('/employee','EmployeeController@index')->name('employee.home')->middleware('isemployee') ;
Route::get('/employee/stocks','EmployeeController@stocks')->middleware('isemployee') ;
Route::get('/employee/tomatich','EmployeeController@tomatich')->middleware('isemployee') ;
//caisse
Route::get('/employee/caisse','EmployeeController@caisse')->middleware('isemployee') ;


//stocks
Route::get('/employee/stocks/UpdateQnttToProduct','EmployeeController@stocksUpdateQnttToProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/addQntProduct','EmployeeController@addQntProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/revokeQntProduct','EmployeeController@revokeQntProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/DeleteVersionProduct','EmployeeController@DeleteVersionProduct')->middleware('isemployee') ;
Route::get('/employee/stocks/versionProduct','EmployeeController@stocksversionProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/addVersionProductForm','EmployeeController@addVersionProductForm')->middleware('isemployee') ;




