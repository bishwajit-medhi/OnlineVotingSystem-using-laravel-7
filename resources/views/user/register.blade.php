@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Type your first name">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Type your last name">
                        </div>
                        <div class="form-group">
                            <label for="deptname">Department Name</label>
                            <input type="text" class="form-control" name="deptname" id="deptname" placeholder="Type your Department name">
                        </div>
                        <div class="form-group">
                            <label for="regno">Registration Number</label>
                            <input type="text" class="form-control @error('regno') is-invalid @enderror" name="regno" id="regno" placeholder="Type your registration number">
                            @error('regno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror 
                        </div>
                        
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Type your password">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
