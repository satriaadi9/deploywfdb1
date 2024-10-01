<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    //
    public function index(){
        return "Hi, my name is FirstController";
    }

    public function index2(Request $request){
        $display = "Display from request2: ". $request->param;
        return $display;
    }

    public function index3(Request $request){
        $display = "Display from request3: ". $request->param;
        return $display;
    }

    public function index4(Request $request){
        $display = "Display from Controller!:<br>";
        $display .= "Parameter 1: ".$request->param1."<br>";
        if(isset($request->param2)){
            $display .= "Parameter 2: ".$request->param2;
        }
        return $display;
    }
}
