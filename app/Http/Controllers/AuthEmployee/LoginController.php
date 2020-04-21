<?php

namespace App\Http\Controllers\AuthEmployee;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }


    public function showLoginForm()
    {
        return view('authEmployee.login');
    }




    public Function login(Request $request)
    {
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::guard('employee')->attempt($credential, $request->member)  ) {
        //if (Auth::guard('employee')->attempt($credential)  ) {
            
            /* $user = Auth::guard('employee')->getLastAttempted();
            dd($user); */
            return redirect()->intended(route('employee.home'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));


    }



    






}
