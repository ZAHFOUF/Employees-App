<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class client extends Controller
{
    public function index () {
        return view('welcome');
    }

    public function info (){
        $test= request("q");

        if (isset($test)) {
            return "<h1> Hello You looking for <b> $test </b> </h1>";
        }else{
            return "<h1> Sir Please Enter Your term search </h1>";
        }

    }
}


