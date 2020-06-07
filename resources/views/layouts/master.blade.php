<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>OVS</title> 
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-info">
            <div class="container">
            <a href="/" class="navbar-brand"><strong>OVS</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route("can.list") }}" class="nav-link">Candidate List</a>
                </li>
                <li class="nav-item dropdown">
                      <a class="nav-link" href="{{ route("register") }}">Register</a>
                  </li>
                <li class="nav-item">
                <a href="{{ route("login") }}" class="nav-link">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<main class="">
    @yield('content')
</main> 


<div id="footer" class="bg-success py-4">   
    <div class="container">
        <div class="row">
            <div class=" text-capitalize col-sm-12  col-md-4 col-lg-4 col-xl-4">
                    <h3 class="color">about us</h3>
                    <hr>
                    <ul class="footer_ul">
                        <li class="footer-item"><a href="" class="footer-link  " data-toggle="modal" data-target="#abc">Feedback</a></li>
                        <li class="footer-item"><a href="" class="footer-link  ">About OVS </a></li>
                        <li class="footer-item"><a href="" class="footer-link  ">Application Form</a></li>
                    </ul>
            </div>
                <div class=" text-capitalize col-sm-12  col-md-4 col-lg-4 col-xl-4">
                    <h3 class="color">contact</h3>
                    <hr>
                    <span class="text-lowercase text-white ">
                        abc@gmail.com<br>
                        1234567890<br>
                        abc@skype.com
                    </span>
            </div>
                <div class=" text-capitalize col-sm-12  col-md-4 col-lg-4 col-xl-4">
                    <h3 class="color">address</h3>
                    <hr>
                    <span class="text-lowercase text-white ">
                    Birkuchi,Narengi<br>
                    Guwahati-781026<br>
                    Assam, India
                    </span>
                    <br>
            </div>
        </div>
        <div class="text-center">
            <h4 class="color">Follow Us</h4><br>
            <p class="">
                <a href="#"><img src="images/facebook.png" class="fimg rounded-circle"/></a>
                <a href="#"><img src="images/twitter.png" class="fimg rounded-circle"></a>
                <a href="#"><img src="images/linkedin.png" class="fimg rounded-circle"></a>
                <a href="#"><img src="images/skype.png" class="fimg rounded-circle"></a>
            </p>
        </div>
    </div>
</div> 

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    </body>
</html>