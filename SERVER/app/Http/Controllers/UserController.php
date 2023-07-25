<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{


    public function index() {

        $user = ['name'=>'YOUNES' , 'lastname'=>'ZAHFOUF' , 'email'=>'youneszahfouf@gmail.com' , 'job' => 'Full Stack'];

    return response()->view("welcome",[ 'data' => $user]);
    }

}
