<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function inputan(){
        return view('register');
    }

    public function daftar(Request $request){
       $first_name = $request->input("first_name");
       $last_name = $request->input("last_name");

       return view('home.home',["first_name" => $first_name, "last_name" => $last_name]);
    }
}
