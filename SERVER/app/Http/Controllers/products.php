<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class products extends Controller
{
    public function index (){
         $products = [
             "name" => "apple",
             "price" => 10
         ];

         $select=["Morroco","Spain","Usa","Uk"];

         return view("welcome",["data" => $products , "select" => $select]);

    }


    public function settings (){

        $color =["red","orange","purple","blue"];


        return view("components.settings")->with("color",$color);



    }
}
