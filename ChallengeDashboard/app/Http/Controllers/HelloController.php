<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
     public function test(){
    //     $controllerTest='Hello from controller.';
    //     return view('hello',[
    //         'controllerTestKey' => $controllerTest,
    //     ]);
    // }
   
    // $admins = \App\Admin::all();
    // //dd($admins);
    // $controllerTest='Hello from controller.';
    // return    view('hello',[
    //          'controllerTestKey' => $controllerTest,
    //         ]);;
    return view('hello');
}
}