@extends('layouts.app')

@section('content')

<div>
    <img src="{{asset('images/vote.jpg')}}" alt="main_pic" class=" w-100" height="350px" >
</div>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h2>Welcome to the Online Voting Portal</h2>
        </div>
        <div class="card-body ">
            <h4 class="text-center">Terms and Condition</h4>
            <p >
                <ul>
                <li> Online voting is available only through this Portal <br></li> 
                <li> Online voting is available only for university students</li> 
                <li> Online voting is available only to the following Member contacts registered within OVS <br></li> 
                <ul>
                    <li type="circle"> Corporate Contacts<br></li> 
                    <li> Authorized contacts with voting rights given by Corporate Contacts <br></li> 
                </ul>
                <li> An online vote cannot be withdrawn after it has been submitted <br></li> 
                <li> Every vote is confidential<br></li> 
                <li> The following information is recorded for audit purposes:<br></li> 
                <ul>
                    <li> The Member and individual person casting vote<br></li> 
                    <li> The number of votes submitted<br></li> 
                    <li> The specific choice exercised by the voter is not linked to any voter’s identity<br></li> 
                </ul>
                <li> University takes no responsibility for ballots submitted by individuals who are no longer authorized by the University.<br></li> 
                </ul>
            </p>

        <form action="{{route('vote')}}" method="POST">
            @csrf
            <div>
                <input type="checkbox" name="T&C" id="T&C" required> <label>I accept the Terms and Conditions</label>
            </div>
            <button type="submit" class="btn btn-primary">Click Here to Cast Your Vote</button>
            </form>
        </div>
    </div>
</div>
@endsection
