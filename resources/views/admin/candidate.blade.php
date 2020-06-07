@extends('layouts.auth')

@section('content')
<div class="container">
    @if (Session::has('errormessage'))
        <div class="alert alert-danger text-center" role="alert">{{ Session::get('errormessage') }}</div>
    @endif 
    @if (Session::has('successmessage'))
        <div class="alert alert-success text-center" role="alert">{{ Session::get('successmessage') }}</div>
    @endif
   
    <table class="table table-hover">
        <tr>
            <th class="text-center" colspan="9">CANDIDATE LIST</th>
        </tr>
        <tr class="text-center">
            <td>Name</td>
            <td>Gender</td>
            <td>Department</td>
            <td>Registration Number</td>
            <td>Party</td>
            <td>Position</td>
            <td>Image</td>
            <td>Status</td>
            <td>Accept/Reject</td>
        </tr>
        <tr>
            <th class="text-center" colspan="9">President</th>
        </tr>
        @foreach ($presidents as $p)
        <tr class="text-center">
            <td>{{ $p->firstname }} {{ $p->lastname }}</td>
            <td>{{ $p->gender}}</td>
            <td>{{ $p->deptname }}</td>
            <td>{{ $p->regno }}</td>
            <td>{{ $p->party }}</td>
            <td>{{ $p->position }}</td>
            <td> <img src="{{ asset('images/candidate/' . $p->image) }}" class="" height="100px" /> </td>
            <td>{{ $p->status }}</td>
            <td>
                <form action="{{route('updatestatus')}}" method="post">
                    @csrf
            @if($p->status == 'confirm' AND $p->status != 'reject')
                <button type="button" class="btn btn-outline-success" value="{{$p->id}}" name="approve" disabled>Approved</button>
            @elseif($p->status != 'confirm' AND $p->status == 'reject')
                <button type="button" class="btn btn-outline-danger" value="{{$p->id}}"name="reject" disabled>Rejected</button>
            @else
                <button type="submit" class="btn btn-outline-success" value="{{$p->id}}" name="approve">Approve</button>
                <button type="submit" class="btn btn-outline-danger" value="{{$p->id}}"name="reject">Reject</button>
            @endif
            </form>
            </td>
            
        </tr>            
        @endforeach
        <tr>
            <th class="text-center" colspan="9">General Secratery</th>
        </tr>
        @foreach ($generals as $general)
        <tr class="text-center">
            <td>{{ $general->firstname }} {{ $general->lastname }}</td>
            <td>{{$general->gender}}</td>
            <td>{{ $general->deptname }}</td>
            <td>{{ $general->regno }}</td>
            <td>{{ $general->party }}</td>
            <td>{{ $general->position }}</td>
            <td> <img src="{{ asset('images/candidate/' . $general->image) }}" class="" height="100px" /> </td>
            <td>{{ $general->status }}</td>
            <td>
                <form action="{{route('updatestatus')}}" method="post">
                    @csrf
            @if($general->status == 'confirm' AND $general->status != 'reject')
                <button type="button" class="btn btn-outline-success" value="{{$general->id}}" name="approve" disabled>Approved</button>
            @elseif($general->status != 'confirm' AND $general->status == 'reject')
                <button type="button" class="btn btn-outline-danger" value="{{$general->id}}"name="reject" disabled>Rejected</button>
            @else
                <button type="submit" class="btn btn-outline-success" value="{{$general->id}}" name="approve">Approve</button>
                <button type="submit" class="btn btn-outline-danger" value="{{$general->id}}"name="reject">Reject</button>
            @endif
            </form>
            </td>
        </tr>            
        @endforeach
        <tr>
            <th class="text-center" colspan="9">Cultural</th>
        </tr>
        @foreach ($culturals as $cultural)
        <tr class="text-center">
            <td>{{ $cultural->firstname }} {{ $cultural->lastname }}</td>
            <td>{{$cultural->gender}}</td>
            <td>{{ $cultural->deptname }}</td>
            <td>{{ $cultural->regno }}</td>
            <td>{{ $cultural->party }}</td>
            <td>{{ $cultural->position }}</td>
            <td> <img src="{{ asset('images/candidate/' . $cultural->image) }}" class="" height="100px" /> </td>
            <td>{{ $cultural->status }}</td>
            <td>
            <form action="{{route('updatestatus')}}" method="post">
                    @csrf
            @if($cultural->status == 'confirm' AND $cultural->status != 'reject')
                <button type="button" class="btn btn-outline-success" value="{{$cultural->id}}" name="approve" disabled>Approved</button>
            @elseif($cultural->status != 'confirm' AND $cultural->status == 'reject')
                <button type="button" class="btn btn-outline-danger" value="{{$cultural->id}}"name="reject" disabled>Rejected</button>
            @else
                <button type="submit" class="btn btn-outline-success" value="{{$cultural->id}}" name="approve">Approve</button>
                <button type="submit" class="btn btn-outline-danger" value="{{$cultural->id}}"name="reject">Reject</button>
            @endif
            </form>
            </td>
        </tr>
        @endforeach
   </table>
</div>
@endsection
