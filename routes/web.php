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
Route::post('/admin/addProductForm','ProductController@addProductForm')->middleware('isadmin');


Route::post('/admin/chekKeyForm','KeyController@chekKeyForm');



// restaurant route
Route::get('/restaurant', 'RestaurantController@index')->middleware('auth');

Route::get('/restaurant/addCategory','RestaurantController@addCategory')->middleware('auth');
Route::post('/restaurant/addCategoryForm','RestaurantController@addCategoryForm')->middleware('auth');




//restaurant meal route
Route::get('/restaurant/addMeal','RestaurantController@addMeal')->middleware('auth');
Route::post('/restaurant/addMealForm','RestaurantController@addMealForm')->middleware('auth');
Route::get('/restaurant/mealsList','RestaurantController@mealsList')->middleware('auth');
Route::get('/restaurant/mealDetails/{meal}','RestaurantController@mealDetails')->middleware('auth');
Route::get('/restaurant/updateMeal/{meal}','RestaurantController@updateMeal')->middleware('auth');
Route::post('/restaurant/updateMealForm','RestaurantController@updateMealForm')->middleware('auth');



//restaurant product

Route::get('/restaurant/addProduct','ProductController@addProduct')->middleware('auth');
Route::post('/restaurant/addProductForm','ProductController@addProductForm')->middleware('auth');



//privilege

Route::get('/restaurant/addPrivilegeToUser','PrivilegeController@addPrivilegeToUser')->middleware('auth');
Route::get('/restaurant/addPrivilegeToUserFormForUpdate/{employee}','PrivilegeController@addPrivilegeToUserFormForUpdate')->middleware('auth');
Route::post('/restaurant/updatePrivilege','PrivilegeController@updatePrivilege')->middleware('auth');


//Provider

Route::get('/restaurant/addProvider','RestaurantController@addProvider')->middleware('auth');
Route::post('/restaurant/addProviderForm','RestaurantController@addProviderForm')->middleware('auth');


//employee
Route::get('/restaurant/addEmployee','RestaurantController@addEmployee')->middleware('auth');
Route::post('/restaurant/addEmployeeForm','RestaurantController@addEmployeeForm')->middleware('auth');
Route::get('/restaurant/employeeCharge','RestaurantController@employeeCharge')->middleware('auth');
Route::post('/restaurant/validatePayEmployee','RestaurantController@validatePayEmployee')->middleware('auth');

//Caisse
Route::get('/restaurant/addCaisse','RestaurantController@addCaisse')->middleware('auth');
Route::post('/restaurant/addCaisseForm','RestaurantController@addCaisseForm')->middleware('auth');



// employee route

//Route::group(['prefix'=>'employee', 'middleware' => 'isemployee'], function(){
Route::group(['prefix'=>'employee'], function(){

Route::get('/login','AuthEmployee\LoginController@showLoginForm')->name('employee.login');
Route::post('/login','AuthEmployee\LoginController@login')->name('employee.login.submit');
Route::get('/','EmployeeController@index')->name('employee.home') ;
Route::get('/stocks','EmployeeController@stocks') ;
Route::get('/tomatich','EmployeeController@tomatich') ;
//caisse
Route::get('/caisse','EmployeeController@caisse') ;


//stocks
Route::get('/stocks/UpdateQnttToProduct','EmployeeController@stocksUpdateQnttToProduct') ;
Route::post('/stocks/addQntProduct','EmployeeController@addQntProduct') ;
Route::post('/stocks/revokeQntProduct','EmployeeController@revokeQntProduct') ;
Route::post('/stocks/DeleteVersionProduct','EmployeeController@DeleteVersionProduct') ;
Route::get('/stocks/versionProduct','EmployeeController@stocksversionProduct') ;
Route::post('/stocks/addVersionProductForm','EmployeeController@addVersionProductForm') ;


});



