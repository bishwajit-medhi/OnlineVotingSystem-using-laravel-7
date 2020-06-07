@extends('layouts.master')

@section('content')

<div class="jumbotron">
    <img src="{{asset('images/vote1.png')}}" alt="main_pic" class="img-fluid w-100" >
</div>
<div class="container">
    <div class="row">
        <div class="col-md-9">
        <div class="card card-body">
            <div class="card-title"><h1>Welcome</h1>
            <p class="text-justify">This system allows all registered student to vote for their candidates in Assam down town University. Remember to keep hidding your information like Registration number since the default number in the system is your registration number. In order to make a vote you have to be registered on the student information system.<br>
                -Candidates may still vote for themselves since they are ADTU students<br>
                -Most recently information will updates in this site to make follow up on election</p>
            </div>
        </div>
        </div>
        <div class="col-md-3">
            <div>
                <div class="card bg-color">
                    <div class="card-header text-danger"><h3>Usefull Link</h3></div>
                    <div class="card-body">
                    <ul class="navbar-nav">
                        <li>
                            <a href="#" class="nav-link">Winner List</a>
                        </li>
                        <li>
                            <a href="{{route("candidate")}}" class="nav-link">Apply for Contest</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
            <div>
                <div class="card bg-color">
                    <div class="card-header text-danger">
                        <h3>Public Notice</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($messages as $message)
                            <p>{{$message->message}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
    
@endsection
