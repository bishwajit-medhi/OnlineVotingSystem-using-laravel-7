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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addreg" >Add Registration</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update" >Update</button>
        </div>
        <table class="table table-hover">
           
           
            <tr class="bg-dark text-light">
                <th class="text-center" colspan="8">All List</th>
            </tr>
            <tr class="text-center">
                <td>Department Name</td>
                <td>Registration Number</td>
            </tr>
            <tr class="bg-dark text-light">
                <th class="text-center" colspan="8">AAA</th>
            </tr>
            @foreach ($firstlists as $firstlist)
            <tr class="text-center">
                <td>{{ $firstlist->deptname }}</td>
                <td>{{ $firstlist->regno }}</td>
            </tr>            
            @endforeach
            <tr class="bg-dark text-light">
                <th class="text-center" colspan="8">BBB</th>
            </tr>
            @foreach ($secondlists as $secondlist)
            <tr class="text-center">
                <td>{{ $secondlist->deptname }}</td>
                <td>{{ $secondlist->regno }}</td>
            </tr>            
            @endforeach
       </table>



        <!--Modal-->

        <div class="modal fade" id="addreg" role="dialog" aria-labelledby="addregnumber" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Registration Number</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("insert.form")}}" method="POST">
                        @csrf
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="deptname" class=" col-form-label text-md-right">{{ __('Depatment Name') }}</label>
                            <div class="">
                                <input id="deptname" type="text" class="form-control @error('deptname') is-invalid @enderror" name="deptname" required>
    
                                @error('deptname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="regno" class=" col-form-label text-md-right">{{ __('Registration Number') }}</label>
                            <div class="">
                                <input id="regno" type="text" class="form-control @error('regno') is-invalid @enderror" name="regno" required>
    
                                @error('regno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                    <button type="submit" class="btn btn-primary">{{__('ADD')}}</button>
                    </form>
                </div>
              </div>
            </div>
          </div>

                <!--Update Modal-->

          <div class="modal fade" id="update" role="dialog" aria-labelledby="update" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Registration Number</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("update.form")}}" method="POST">
                        @csrf
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif

                        <div class="form-group">
                            <label for="olddeptname" class=" col-form-label text-md-right">{{ __('Department name') }}</label>
                            <div class="">
                                <select id="olddeptname" class="form-control @error('olddeptname') is-invalid @enderror" name="olddeptname" required>
                                    @foreach ($lists as $list)
                                    <option value="{{$list->deptname}}">{{$list->deptname}}</option>
                                    @endforeach
                                </select>
                                @error('olddeptname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="oldregno" class=" col-form-label text-md-right">{{ __('Old Registration number') }}</label>
                            <div class="">
                                <select id="oldregno" class="form-control @error('oldregno') is-invalid @enderror" name="oldregno" required>
                                    @foreach ($lists as $list)
                                    <option value="{{$list->regno}}">{{$list->regno}}</option>
                                    @endforeach
                                </select>
                                @error('oldregno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="deptname" class=" col-form-label text-md-right">{{ __('Depatment Name') }}</label>
                            <div class="">
                                <select id="deptname" class="form-control @error('deptname') is-invalid @enderror" name="deptname" required>
                                    <option value="AAA">AAA</option>
                                    <option value="BBB">BBB</option>
                                </select>
                                @error('deptname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="regno" class=" ">{{ __('Registration Number') }}</label>
                            <div class="">
                                <input id="regno" type="text" class="form-control @error('regno') is-invalid @enderror" name="regno" required>
    
                                @error('regno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                    <button type="submit" class="btn btn-primary">{{__('UPDATE')}}</button>
                    </form>
                </div>
              </div>
            </div>
          </div>

        {{-- <div class="card">
            <div class="card-header">ADD Department Name AND Registration Number</div>
            <div class="card-body">
            <form action="{{route("add.form")}}" method="POST">
                    @csrf
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                    <div class="form-group">
                        <label for="deptname" class=" col-form-label text-md-right">{{ __('Depatment Name') }}</label>
                        <div class="col-md-6">
                            <input id="deptname" type="text" class="form-control @error('deptname') is-invalid @enderror" name="deptname" required>

                            @error('deptname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="regno" class=" col-form-label text-md-right">{{ __('Registration Number') }}</label>
                        <div class="col-md-6">
                            <input id="regno" type="text" class="form-control @error('regno') is-invalid @enderror" name="regno" required>

                            @error('regno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                <button type="submit" class="btn btn-primary">{{__('ADD')}}</button>
                </form>
            </div>
        </div> --}}
    </div>
@endsection

