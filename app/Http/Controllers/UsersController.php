<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Auth;
use App\User;
use App\ActivityLog;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $activityLogData = $this->userData();
        $activityLogData['action'] = 'view list';
        ActivityLog::create($activityLogData);
        return view('users.index');
    }

    public function getDatatable()
    {
        
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
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        $activityLogData = $this->userData();
        $activityLogData['action'] = 'create user: '.$data['username'];
        ActivityLog::create($activityLogData);

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
        $activityLogData = $this->userData();
        $activityLogData['action'] = 'update user:'.$id;
        ActivityLog::create($activityLogData);

        $rules = array(
            'username'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {

            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = User::find($id);
            $user->username       = Input::get('username');
            $user->save();
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

        $activityLogData = $this->userData();
        $activityLogData['action'] = 'delete user:'.$id;
        ActivityLog::create($activityLogData);

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
        $data = Request::all();

        $rules = array(
            'username' => 'required',
            'password' => 'required|min:6' ,
             );
        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
            echo "failed";
        }
        else {
          $userdata = array(
                'username' => Request::get('username'),
                'password' => Request::get('password')
              );

          if (Auth::attempt($userdata)) {
            echo "success";
            Session::flash('message', 'Success'); 
          }
          else{
            echo "wait";
          }
        }
    }

    /*
        return auth user data for data table activity logging
    */
    public function userData(){
        $userId = Auth::user()->id;
        $username = Auth::user()->username;
        $currentUrl = Request::path();
        $ipAddress = Request::ip();

        $activityLogData = array(
            'user_id'       => $userId,
            'username'      => $username,
            'current_url'   => $currentUrl,
            'ip_address'    => $ipAddress
            );

        return $activityLogData;
    }

    /*
        show logs to user
    */
    public function logs()
    {
        $userId = Auth::user()->id;
        $logs = ActivityLog::where('user_id', '>', "'".$userId."'")->get();
        return view('users.logs',compact('logs'));
    }

    
}

