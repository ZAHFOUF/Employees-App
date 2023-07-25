<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $data = DB::table("products")->get('*') ;

        return response()->json($data)->header('Access-Control-Allow-Origin', '*');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        $data = new Product();

        $data->id = $request->id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $path = $request->file('img')->store('products','public') ;

        $path =env('APP_URL').'/storage/'. $path ;

        $data->img = $path;

        $data->save();








        $message = ['message' => 'item added successfuly','path' => $path] ;
        return response()->json($message)->header('Access-Control-Allow-Origin', '*') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table("products")->get('*')->where('id',$id) ;

        if (count($data) > 0) {
            return response()->json($data,200)->header('Access-Control-Allow-Origin', '*');

        }else{
            $message = ['message' => 'there is no product with this id'] ;
            return response()->json($message,406)->header('Access-Control-Allow-Origin', '*');

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::findOrFail($id);

        $data->id = $request->id;
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $path = $request->file('img')->store('products','public') ;

        $path =env('APP_URL').'/storage/'. $path ;

        $data->img = $path;

        $data->save();





        $message = ['message' => 'item updated successfuly'] ;
        return response()->json($message)->header('Access-Control-Allow-Origin', '*') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("products")->where('id',$id)->delete() ;

        $message = ['message' => 'item deleted successfuly'] ;
        return response()->json($message)->header('Access-Control-Allow-Origin', '*') ;
    }


    public function uploadFile (Request $req) {

        $path = $req->file('product')->store('products','public') ;

        $path =env('APP_URL').'/storage/'. $path ;



        return response()->json(['path',$path,200]) ;




    }


    public function downloadFile (Request $req) {

        $path = 'C:\Users\l\Videos\employees_app\SERVER\storage\app\ONE-PAGE-CHECKOUT-FOR-WOOCOMMERCE-ar.zip' ;

        $name = 'template' ;

        $headers = ['Content-Type' => 'application/zip','Access-Control-Allow-Origin' => '*'] ;

        $message = ['message' => 'TankYou For Downloading our template'] ;

        return response()->download($path,$name,$headers) ;


    }
}
