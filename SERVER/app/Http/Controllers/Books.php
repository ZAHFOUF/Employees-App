<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Books extends Controller
{
    public function Getdata () {

        $data =json_encode( Product::all('*'));



        return view("home.page",['data' => $data]) ;
    }


    public function Adddata (Request $req) {

          $pro = new Product() ;



          $pro->name = $req->name ;
          $pro->price = $req->price ;
          $pro->description = $req->description ;

          // image

          if (isset($req->img)) {
            $path = $req->file('img')->store('products','public');
            $path =env('APP_URL').'/storage/'. $path ;
        }else{
            $path =env('APP_URL').'/storage/'. 'test.png' ;
        }

          $pro->img = $path ;

          $pro->save();


           return redirect()->route('testing')->with("messageadd" , "Product Added !");


    }

    public function Updata (Request $req) {

        if (isset($req->img)) {
            $path = $req->file('img')->store('products','public');
            $path =env('APP_URL').'/storage/'. $path ;
        }else{
            $path =env('APP_URL').'/storage/'. 'test.png' ;
        }

        $data =['name' => $req->name, 'price' => $req->price , "description" => $req->description , "img" => $path];

        Product::where('id',$req->id)->update($data) ;


       return redirect()->route('testing')->with("messageup" , "Product Up !");



    }


    public function Aidata (Request $req) {

        $input = $req->text ;

        if (isset($input)) {

        $basedfile = base_path('ai/generate.py') ;

       $output = exec("py $basedfile $input");





        return view("home.ai",['text' => $output]) ;

    }


    return view("home.ai",['text' => '' ]) ;



    }


    public function Aireq (Request $req) {

        $input = $req->q ;

        if (isset($input)) {

        $basedfile = base_path('ai/scaping.py') ;

        $output = exec("py $basedfile $input ");

        $file_path = 'C:\Users\l\Videos\employees_app\SERVER\amazon_products.csv';





        return view("home.ai",['text' => "py $basedfile $input " ]) ;


    }

    return view("home.ai",['text' => ' ' ]) ;



    }














}
