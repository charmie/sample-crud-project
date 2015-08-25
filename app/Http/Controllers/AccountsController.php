<?php

namespace App\Http\Controllers;



use App\User;
use DB;
use Request;
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
        //dd($userdata);
        $userData = array('username' => $userdata['username'], 'password' => $userdata['password']);            
        

        $test = Auth::attempt($userData);
        dd($test);

        return (string) Auth::attempt($userdata);
        

        /*
        // Getting all post data
        $data = Request::all();
        //dd($data);
        
        // Applying validation rules.
        $rules = array(
            'username' => 'required',
            'password' => 'required|min:6' ,
             );
        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
          // If validation falis redirect back to login.
          //return Redirect::to('/')->withInput(Input::except('password'))->withErrors($validator);
            echo "failed";
        }
        else {
          $userdata = array(
                'username' => Request::get('username'),
                'password' => Request::get('password')
              );
          
            
            if (Auth::attempt(array('username' => Request::get('username'), 'password' => Request::get('password')))){
                echo "success";
                Session::flash('message', 'Success'); 
            }
            else{
                echo "wait";
            }
        }
        */
        
    }
}
