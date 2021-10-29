<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class UserfrontendController extends Controller
{
    //
    public function index(Request $request){
        // return dd($request);
        return view('frontendportfolio.frontindex');

    }
}
