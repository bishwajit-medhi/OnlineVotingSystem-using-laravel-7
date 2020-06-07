<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index(){
        $messages = DB::table('messages')->get();

        return view('welcome',['messages'=>$messages]);
    }
    
}
