@extends('layouts.auth')

@section('content')
<div class="container">
    @if (Session::has('errormessage'))
        <div class="alert alert-danger text-center" role="alert">{{ Session::get('errormessage') }}</div>
    @endif 
    @if (Session::has('successmessage'))
        <div class="alert alert-success text-center" role="alert">{{ Session::get('successmessage') }}</div>
    @endif
    <div class="ml-auto py-1">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message" >Message</button>
    </div>
    <div class="row py-2 my-2">
        <div class=" mx-2 ">
            <div class="card bg-primary my-1 ">
                <div class="card-header text-white px-5">
                    <h4>Total Students</h4>
                </div>
                <div class=" card-body text-white d-flex align-items-center justify-content-between px-5 ">
                       <p style="font-size: 7vh; margin-bottom:0rem">{{$students}}</p> 
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between px-5">
                    <a class="small text-white" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class=" mx-2 ">
            <div class="card bg-success my-1">
                <div class="card-header text-white  px-5">
                    <h4> Total Candidates </h4>
                </div>
                <div class=" card-body text-white  px-5">
                    <p style="font-size: 7vh; margin-bottom:0rem" class="">{{$candidates}}</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between px-5">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class=" mx-2 ">
            <div class="card bg-warning my-1">
                <div class="card-header text-white  px-5">
                    <h4>Registerted Student</h4>
                </div>
                <div class=" card-body text-white  px-5">
                    <p style="font-size: 7vh; margin-bottom:0rem" class="">
                        {{round($percentage, 2)}}%
                    </p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between px-5">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class=" mx-2 ">
            <div class="card bg-danger my-1">
                <div class="card-header text-white  px-5">
                    <h4>Total voted Student</h4>
                </div>
                <div class=" card-body text-white  px-5">
                    <p style="font-size: 7vh; margin-bottom:0rem" class="">
                        {{round($voteedpercentage, 2)}}%
                    </p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between px-5">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    
    <table class="table table-hover">
        <tr>
            <th class="text-center bg-info" colspan="8">VOTE COUNTING TABLE</th>
        </tr>
        <tr class="text-center">
            <td>Name</td>
            <td>Gender</td>
            <td>Department</td>
            <td>Registration Number</td>
            <td>Party</td>
            <td>Position</td>
            <td>Image</td>
            <td>Votecount</td>
        </tr>
        <tr>
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
            <td> <img src="{{ asset('images/candidate/' . $p->image) }}" class="" height="100px" /> </td>
            <td>{{ $p->votecount }}</td>
            
        </tr>            
        @endforeach
        <tr>
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
            <td> <img src="{{ asset('images/candidate/' . $general->image) }}" class="" height="100px" /> </td>
            <td>{{ $general->votecount }}</td>
        </tr>            
        @endforeach
        <tr>
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
            <td> <img src="{{ asset('images/candidate/' . $cultural->image) }}" class="" height="100px" /> </td>
            <td>{{ $cultural->votecount }}</td>
        </tr>
        @endforeach
   </table>
</div>





<div class="modal fade" id="message" role="dialog" aria-labelledby="update" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Registration Number</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route("update.message")}}" method="POST">
                @csrf
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif

                <div class="form-group">
                    <label for="message" class=" col-form-label text-md-right">{{ __('Message') }}</label>
                    <div class="">
                        <textarea id="message" class="form-control" name="message" required></textarea>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">{{__('UPDATE MESSAGE')}}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
