<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AddDeptRegController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allList(){
        
        $lists = DB::table('departments')->get();
        $firstlists = DB::table('departments')->where('deptname','AAA')->get();
        $secondlists = DB::table('departments')->where('deptname','BBB')->get();

        return view('admin.adddept',['firstlists'=>$firstlists, 'secondlists'=>$secondlists,'lists'=>$lists]);
    }

     public function index(Request $request){
        if($validatedData = $request->validate([
            'deptname' => 'required|string|max:255',
            'regno' => 'required|string|max:255',
        ]));

        $record = DB::table('departments')
        ->where('regno', $request['regno'])->first();;
            if($record == true){
                Session::flash('message', "Alredy Exist");
    	return redirect()->back()->with('message','Data Alredy Exist');
            }
            //dd(request()->all());

            DB::table('departments')
    	    ->insert([
            'id'=>$request->input('id'),
            'deptname'=>$request->input('deptname'),
            'regno'=>$request->input('regno'),
    	   ]);
           //Session::flash('successmessage', "Successfull");
    	return redirect()->back()->with('successmessage','Number Added Successfully');
    }

    public function updateNumber(Request $request){


        $checkstudent=DB::table('students')
        ->where('regno', $request['oldregno'])->first();

        $checkcandidates=DB::table('candidates')
        ->where('regno', $request['oldregno'])->first();

        if($checkstudent == true OR $checkcandidates == true){
           // dd(request()->all());
            return redirect()->back()->with('errormessage','User Already Registerded');
        }
            
        $update = DB::table('departments')
        ->where('regno', $request['oldregno'])
        ->where('deptname', $request['olddeptname'])->first();;
            
        if($update == false){
       
        //Session::flash('errormessage', "Information Doesnot Match");
    	return redirect()->back()->with('errormessage','Information Doesnot Match');
        }
       
        $updatelist=DB::table('departments')
              ->where('regno', $request['oldregno'])
              ->update(['regno' => $request['regno'], 'deptname'=>$request['deptname']]);
              return redirect()->back()->with('successmessage','Updated Successfully');
    
    }
}
