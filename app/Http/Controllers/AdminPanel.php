<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanel extends Controller
{
    //
    public function admin(){
       // print_r($req->all());
       return view('frontend/user/admin');
    }
}
