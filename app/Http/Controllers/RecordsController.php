<?php

namespace App\Http\Controllers;

use App\Record;
//use Illuminate\Support\Facades\Datatable;
use Illuminate\Http\Request;
use Datatable;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $table = Datatable::table()
          ->addColumn('Username')
          ->setUrl(route('api.users'))
          ->noScript();

        $this->layout->content = View::make('records.index', array('table' => $table));
        /*
        $data = Record::all();
        
        return view('records.index',compact('data'));
        */
    }

    public function getAllRecords(){
        return view('records/allRecords');
    }


    public function getDatatable()
    {
        return Datatable::collection(User::all(array('id','name')))
        ->showColumns('id', 'username')
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
        return view('records.create');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
