<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanel extends Controller
{
    //
    public function admin(){
        return view('frontend/user/admin');
    }
}
