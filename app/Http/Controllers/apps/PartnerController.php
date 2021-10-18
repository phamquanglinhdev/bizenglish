<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    public function index(){
        $partners = User::where("role",'=',3)->get();
        return view("application.partner",['partners'=>$partners]);
    }
    public function create(){
        return view("application.partnercreate");
    }
    public function store(Request $request){
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>3,
            'avatar'=>$request->avatar,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->email)
        ];
        User::create($data);
        return $this->create();
    }
}
