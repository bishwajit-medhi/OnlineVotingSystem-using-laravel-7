@extends('layouts.master')

@section('content')

<div id="form" class="p-3">
    <div class="container">
        <div class="row justify-content-center">
        <div class="card w-50 text center">
            <div class="card-header text-center p-4">
                <h1>Candidate Application Form </h1>
            </div>
            <div class="card-body">
            <form action="{{route("candidate")}}" method="POST" enctype="multipart/form-data">

            @csrf

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Type your first name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Type your last name" required>
                        </div>
                        <div class="form-group">
                            <label for="deptname">Department Name</label>
                            <input type="text" class="form-control" name="deptname" id="deptname" placeholder="Type your Department name" required>
                        </div>
                        <div class="form-group">
                            <label for="regno">Registration Number</label>
                            <input type="text" class="form-control" name="regno" id="regno" placeholder="Type your registration number" required>
                        </div>
                        <div class="form-group">
                            <label for="party">Party</label>
                            <select class="form-control" name="party" id="party" required>
                                <option>Select Party</option>
                                <option value="ABC">ABC</option>
                                <option value="MNO">MNO</option>
                                <option value="XYZ">XYZ</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="position">Position</label>
                            <select class="form-control" name="position" id="position" required>
                                <option>Select Position</option>
                                <option value="President">President</option>
                                <option value="General Secretary">General Secretary</option>
                                <option value="Cultural">Cultural</option>
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Type your valid email address" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                <label class="form-check-label" for="male">
                                  Male
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">
                                  Female
                                </label>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Apply') }}</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>
    
@endsection
