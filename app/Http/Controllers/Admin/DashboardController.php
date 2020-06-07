<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = DB::table('students')->count();
        $candidates = DB::table('candidates')->count();
        $departments = DB::table('departments')->count();
        $percentage = $students/$departments*100;

        $studentvotecount = DB::table('students')->where('status', 'Voted')->count();
        $voteedpercentage = $studentvotecount/$departments*100;
        $presidents = DB::table('candidates')->where('position','president')->get();
        $generals = DB::table('candidates')->where('position','General Secretary')->get();
        $culturals = DB::table('candidates')->where('position','cultural')->get();

        
        return view('admin.dashboard', ['students' => $students, 'candidates' => $candidates,'percentage' => $percentage,'voteedpercentage' =>$voteedpercentage, 'presidents'=>$presidents,'generals'=>$generals ,'culturals'=>$culturals ]);
    }

    public function messageUpdate(Request $request)
    {
        $count=DB::table('messages')->count();
       // dd($count);
        if($count==false){
            $updatemessage=DB::table('messages')

            ->insert(['message'=>$request['message']]);
            return redirect()->back()->with('successmessage','Message Updated Successfully');
        }
        $updatemessage=DB::table('messages')
            ->where('id', 1)
            ->update(['message'=>$request['message']]);
            return redirect()->back()->with('successmessage','Message Updated Successfully');
    }
}
