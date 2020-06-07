<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CastVoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        if(Auth::user()->status == "Voted"){
            // dd(Auth::user()->status);
             return redirect('/success');
         }
         
        $presidents = DB::table('candidates')->where('position','president')->where('status','Confirm')->get();
        $generals = DB::table('candidates')->where('position','General Secretary')->where('status','Confirm')->get();
        $culturals = DB::table('candidates')->where('position','cultural')->where('status','Confirm')->get();

        return view('user.castvote', ['presidents'=>$presidents,'generals'=>$generals ,'culturals'=>$culturals]);
    }

    public function castVote( Request $request){

   


       // dd(request('cultural'));
        DB::table('candidates')->where('regno', request('cultural'))->increment('votecount',1);
        DB::table('candidates')->where('regno', request('president'))->increment('votecount',1);
        DB::table('candidates')->where('regno', request('general'))->increment('votecount',1);
        DB::table('students')->where('id' , Auth::user()->id)->update(['status' => 'Voted']);

        return redirect('/success');
    }
}
