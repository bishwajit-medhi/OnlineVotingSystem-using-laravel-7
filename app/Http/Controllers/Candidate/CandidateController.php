<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class CandidateController extends Controller
{
    public function showCandidateForm(){

    	return view('user.candidateform');
    }

     public function formSubmit(Request $request){
        if($validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'deptname' => 'required|string|max:255',
            'regno' => 'required|string|max:255',
            'party' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gender' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg',

            
        ]));

        $record=DB::table('departments')
        ->where('deptname', $request['deptname'])
        ->where('regno', $request['regno'])->first();

       
        if($record == false){

          //dd(request()->all());

        return redirect('/candidate');
        }

        if ($request->hasFile('image')) {
    	   
        $image = $request->file('image');
        $file   = microtime().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = public_path('images/candidate' );
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$file);

    }
        
            DB::table('candidates')
    	    ->insert([
            'id'=>$request->input('id'),
            'firstname'=>$request->input('firstname'),
            'lastname'=>$request->input('lastname'),
            'deptname'=>$request->input('deptname'),
            'regno'=>$request->input('regno'),
            'party'=>$request->input('party'),
            'position'=>$request->input('position'),
            'email'=>$request->input('email'),
            'gender'=>$request->input('gender'),
    	    'image'=>$file,
    	   ]);
    	
    	
           Session::flash('message', "Successfull");
    	return redirect()->back()->with('message','Form Submitted Successfully');
    }

}

