<?php

namespace App\Http\Controllers;



use App\User;
use DB;
use Request;
use Response;
use Datatable;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;




class AccountsController extends Controller
{
    public function login()
    {
        //$method = $this->method();
        
        //dd(Request::method().' '.Request::fullUrl());
        return view('accounts.login');
    }

    /**
     * User login submit
     */
    public function userLogin(){
        $data = Input::all();
        

        $rules = array(
            'username' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($data, $rules);
        
        

        if ($validator->fails()){
            echo "failed";
        }
        else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
              );
        }
        //dd($userdata);
        $userData = array('username' => $userdata['username'], 'password' => $userdata['password']);            

        $attempt = Auth::attempt($userData);
        //dd($attempt);
        
        if($attempt){
            //dd('sup');
            return redirect('accounts/dashboard');
        }
        else{
            return redirect('accounts/halt');
        }
       
    }

    /*
        user account dashboard
    */
    public function dashboard(){
        $authStatus = Auth::check();
        
        return view('accounts.dashboard');
    }

    /*
        user account halt
    */
    public function halt(){
        return view('accounts.halt');
    }

    /*
        logout user
    */
    public function logout(){
        Auth::logout();
        //dd($authStatus);
    }


}
