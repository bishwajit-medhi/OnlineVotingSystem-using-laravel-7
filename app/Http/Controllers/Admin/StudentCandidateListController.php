<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentCandidateListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function candidateList(){
        
        $presidents = DB::table('candidates')->where('position','president')->get();
        $generals = DB::table('candidates')->where('position','General Secretary')->get();
        $culturals = DB::table('candidates')->where('position','cultural')->get();

        return view('admin.candidate', ['presidents'=>$presidents,'generals'=>$generals ,'culturals'=>$culturals]);
    }

    public function updateStatus(Request $request)
    {
        //dd(request()->all());
        if($request['approve'] != null AND $request['reject']== null )
       
        {
        $acceptstatus= DB::table('candidates')
        ->where('id', $request['approve'])
        ->update(['status' => 'confirm']);
        return redirect()->back()->with('successmessage','Approved');
        }

        $rejectstatus= DB::table('candidates')
        ->where('id', $request['reject'])
        ->update(['status' => 'reject']);
        return redirect()->back()->with('rejectmessage','Rejected');
        
    }

    public function studentList(Request $request){
        
        $students = DB::table('students')->get();

        if($request->ajax()){
           return response()->json(array('students'=>$students));
        }
        return view('admin.studentlist', compact('students'));

        
    }

}