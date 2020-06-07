@extends('layouts.app')

@section('content')

<div>
    <img src="{{asset('images/vote.jpg')}}" alt="main_pic" class=" w-100" height="350px" >
</div>
<div class="container">
    <div class="align-self-center">
    <form action="{{route("castvote")}}" method="POST">
            @csrf
            <table class="table table-bordered table-info">
                <tr>
                    <th class="text-center" colspan="8"><h1><b> CAST YOUR VOTE </b></h1></th>
                </tr>
                <tr class="text-center text-uppercase">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Party</th>
                    <th>Cast Your Vote</th>
                </tr>
                <tr >
                    <th class="text-center" colspan="8">President</th>
                </tr>
            @foreach ($presidents as $p)
                <tr class="text-center">
                    <td> <img src="{{ asset('images/candidate/' . $p->image) }}" class="" height="100px" /> </td>
                    <td>{{ $p->firstname }} {{ $p->lastname }}</td>
                    <td>{{ $p->party }}</td>
                    <td><input type="radio" name="president" value="{{ $p->regno }}" id=""></td>
                </tr>        
            @endforeach
            <tr>
                <th class="text-center" colspan="8">General Secratery</th>
            </tr>
    
            @foreach ($generals as $g)
                <tr class="text-center">
                    <td> <img src="{{ asset('images/candidate/' . $g->image) }}" class="" height="100px" /> </td>
                    <td>{{ $g->firstname }} {{ $p->lastname }}</td>
                    <td>{{ $g->party }}</td>
                    <td><input type="radio" name="general" value="{{ $g->regno }}" id=""></td>
                </tr>        
            @endforeach
            <tr>
                <th class="text-center" colspan="8">Cultural</th>
            </tr>
            @foreach ($culturals as $c)
                <tr class="text-center">
                    <td> <img src="{{ asset('images/candidate/' . $c->image) }}" class="" height="100px" /> </td>
                    <td>{{ $c->firstname }} {{ $p->lastname }}</td>
                    <td>{{ $c->party }}</td>
                    <td><input type="radio" name="cultural" value="{{ $c->regno }}" id=""></td>
                </tr>        
            @endforeach
            <tr >
                <td class="text-center" colspan="8"> <button type="submit" class="btn btn-success">Cast Your Vote</button> </td>
            </tr>
            </table>
        </form>
    </div>
    
</div>
@endsection
