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

        $userData = array('username' => $userdata['username'], 'password' => $userdata['password']);            

        $attempt = Auth::attempt($userData);
        
       
        if($attempt){
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
        return redirect('users');
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
        return redirect('accounts/login');
    }

    public function registration(){
        return view('accounts.registration');
    }

    public function registerAccount(){
        $data = Input::all();

        $rules = array(
            'username' => 'required',
            'password' => 'required|min:6',
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
            return redirect('accounts/registrationFailed');
        }
        else {
            $userdata = array(
                'username' => Input::get('username'),
                'password' => Input::get('password')
              );
            $data['password'] = Hash::make(Input::get('username'));
            User::create($data);
            return redirect('accounts/registrationSuccess');
        }

    }

    public function registrationSuccess(){
        return view('accounts.registrationSuccess');
    }

    public function registrationFailed(){
        return view('accounts.registrationFailed');
    }
}
    