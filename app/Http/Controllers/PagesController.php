<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about(){
        $name = "Charmaine";
        //return view('pages.about')->with('name',$name);
        /*
        return view('pages.about')->with([
            'first' => 'Charmaine',
            'last'  => 'Aliros'
        ]);
        */
        $first = "Charmaine";
        $mid   = "Agrava";
        $last  = "Aliros";

        return view('pages.about',compact('first','mid','last'));
    }

    public function contact(){
        return view('pages.contact');
    }
}
