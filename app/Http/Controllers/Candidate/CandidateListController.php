<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CandidateListController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */


   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
       
       $presidents = DB::table('candidates')->where('position','president')->get();
       $generals = DB::table('candidates')->where('position','General Secretary')->get();
       $culturals = DB::table('candidates')->where('position','cultural')->get();

       return view('user.candidatelist', ['presidents'=>$presidents,'generals'=>$generals ,'culturals'=>$culturals]);
   }
}
