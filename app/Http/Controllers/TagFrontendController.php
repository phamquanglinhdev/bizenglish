<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagFrontendController extends Controller
{
    public function index(){
        return view('frontend.list');
    }
}
