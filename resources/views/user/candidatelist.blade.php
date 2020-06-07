@extends('layouts.master')

@section('content')
<div class="container">
    <table class="table table-hover">
        <tr class="bg-dark text-light">
            <th class="text-center text-uppercase" colspan="8">Applied Candidates</th>
        </tr>
        <tr class="text-center">
            <td>Name</td>
            <td>Gender</td>
            <td>Department</td>
            <td>Registration Number</td>
            <td>Party</td>
            <td>Position</td>
            <td>Image</td>

        </tr>
        <tr class="bg-dark text-light">
            <th class="text-center" colspan="8">President</th>
        </tr>
        @foreach ($presidents as $p)
        <tr class="text-center">
            <td>{{ $p->firstname }} {{ $p->lastname }}</td>
            <td>{{ $p->gender}}</td>
            <td>{{ $p->deptname }}</td>
            <td>{{ $p->regno }}</td>
            <td>{{ $p->party }}</td>
            <td>{{ $p->position }}</td>
            <td> <img src="{{ asset('images/candidate/' . $p->image) }}" class="img-responsive" height="100px" /> </td>
        </tr>            
        @endforeach
        <tr class="bg-dark text-light">
            <th class="text-center" colspan="8">General Secratery</th>
        </tr>
        @foreach ($generals as $general)
        <tr class="text-center">
            <td>{{ $general->firstname }} {{ $general->lastname }}</td>
            <td>{{$general->gender}}</td>
            <td>{{ $general->deptname }}</td>
            <td>{{ $general->regno }}</td>
            <td>{{ $general->party }}</td>
            <td>{{ $general->position }}</td>
            <td> <img src="{{ asset('images/candidate/' . $general->image) }}" class="img-responsive" height="100px" /> </td>
        </tr>            
        @endforeach
        <tr class="bg-dark text-light">
            <th class="text-center" colspan="8">Cultural</th>
        </tr>
        @foreach ($culturals as $cultural)
        <tr class="text-center">
            <td>{{ $cultural->firstname }} {{ $cultural->lastname }}</td>
            <td>{{$cultural->gender}}</td>
            <td>{{ $cultural->deptname }}</td>
            <td>{{ $cultural->regno }}</td>
            <td>{{ $cultural->party }}</td>
            <td>{{ $cultural->position }}</td>
            <td> <img src="{{ asset('images/candidate/' . $cultural->image) }}" class="img-responsive" height="100px" /> </td>
        </tr>
        @endforeach
   </table>
</div>
@endsection
