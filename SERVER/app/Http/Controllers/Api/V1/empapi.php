<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\empReq;
use App\Models\employees;

use Illuminate\Support\Facades\Storage;

class empapi extends Controller
{
    public function index()
{



        $emp = employees::paginate(3);
        return response()->json($emp)->header('Access-Control-Allow-Origin', '*');


}

public function all()
{



        $emp = employees::all('*');
        return response()->json($emp)->header('Access-Control-Allow-Origin', '*');


}


public function store(empReq $request)
{
    employees::create($request->validated());
    return response()->json("created successfully")->header('Access-Control-Allow-Origin', '*');

}

public function update(empReq $request,employees $emp,$employee)
{
    $emp::where('id', $employee )->update($request->validated());
    return response()->json("updated successfully")->header('Access-Control-Allow-Origin', '*');

}

public function show(employees $emp,$employee){
     $emp = $emp::find($employee);
     return response()->json($emp)->header('Access-Control-Allow-Origin', '*');
}

public function destroy(employees $emp,$employee){
    $emp::where('id', $employee )->delete();
    return response()->json("deleted successfully")->header('Access-Control-Allow-Origin', '*');
}

public function count(employees $emp){
    $emp = $emp::all('*')->count();
    $data = ["total"=>$emp];
    return response()->json($data)   ->withHeaders([
        'Content-Type' => 'application/json',
        'Access-Control-Allow-Origin' => '*'
    ])->cookie('user','10',36);
}

public function download(){

    $emp = employees::all(['id','fs','ls','age','address']);


    $data = json_decode($emp, true);

   $csv = implode(',', ['id','fs','ls','age','address']) . "\n";
   foreach ($data as $element) {
    $csv .=implode(',', array_values($element)) . "\n";
}



    $path = 'emp.csv';
    $name = 'employees.csv';
    $headers = ['Content-Type'=> 'text/csv','Access-Control-Allow-Origin' => '*'];


    Storage::put($path,$csv);

    $path = 'C:\Users\l\Videos\employees_app\SERVER\storage\app\emp.csv';



    return response()->download($path,$name,$headers);
}

public function render(){

    $path = 'C:\Users\l\Downloads\test ZAHFOUF.pdf';
    $headers = ['Content-Type'=> 'application/pdf'];

    return response()->file($path,$headers);
}

}
