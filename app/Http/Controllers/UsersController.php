<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Request;
use Datatable;

// use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
//use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        //$users = User::all();
        //return view('User.index',['users'=>$users]);
        return view('users.index');
    }

    public function getDatatable()
    {
        /*
        dd(Datatable::collection(User::all(array('id','username')))
        ->showColumns('id', 'username')
        ->searchColumns('username')
        ->orderColumns('id','username')
        ->make(true));
        */
        //dd(User::all());
        return Datatable::collection(User::all(array('id','username')))
        ->showColumns('id', 'username')
        ->addColumn('dropdown',
            function($model){
                return '<a href="' . URL::to( 'users/' . $model->id . '/edit' ) . '"> Edit</a>'.
                '<a href="' . URL::to( 'users/' . $model->id . '/destroy' ) . '"> Delete</a>'; 
                ;
            }
        )
        ->searchColumns('username')
        ->orderColumns('id','username')
        ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }


    public function createUser(){
        $data = Request::all();

        User::create($data);
        //return $data;        
        return redirect('users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        //$udsers = DB::table('users')->where('id', '=', $id)->get();

        //dd($users);
        //return $users;
        
        return view('users.edit',compact('users'));
    }
    public function saveEdit(){
        $data = Request::all();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'username'       => 'required'
            
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->username       = Input::get('username');
            $user->save();
            

            // redirect
            Session::flash('message', 'Successfully updated user!');
            return Redirect::to('users');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the user!');
        return Redirect::to('users');
    }

    /**
     * User login page
     */
    public function login()
    {
        
        return view('users.login');
    }

    /**
     * User login submit
     */
    public function userLogin(){
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
          //dd($userdata);
            
          // doing login.
          //if (Auth::validate($userdata)) {
        
              //return Redirect::intended('books');
                if (Auth::attempt($userdata)) {
            // Authentication passed...
            //return redirect()->intended('dashboard');
                    echo "success";

                    Session::flash('message', 'Success'); 
        
                
            }
            else{
                echo "wait";
            }
          //} 

        }
        
    }
    
}

