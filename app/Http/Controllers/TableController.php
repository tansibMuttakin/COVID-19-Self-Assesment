<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TableController extends Controller
{
    public function index(){
        $user = User::get();
        return view('data_table')->with('user',$user);
    }
}
