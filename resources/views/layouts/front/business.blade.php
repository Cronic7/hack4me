<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    @yield('css')
    <link href="{{ asset('assets/css/page.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
{{--     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 --}}    <link href="{{ asset('assets/css/business-costume.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo/business1.png') }}">
    <link rel="icon" href="{{ asset('assets/img/logo/business1.png') }}">
    @yield('css')
  </head>
  <style type="text/css">
    
   
    
  </style>

  <body>


    <!-- Navbar -->
   <!--  <nav class="navbar navbar-expand-lg navbar-dark" data-navbar="fixed"> -->
      <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{route('business.dashboard')}}">
           <img class="logo-light" src="{{ asset('assets/img/logo-hacke4me.png') }}" alt="logo">
            <img class="logo-dark" src="{{ asset('assets/img/resize-logo.png') }}" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <nav class="nav nav-navbar ml-auto">
            <a class="nav-link active" href="{{route('business.dashboard')}}">Home</a>
           @if(Auth::user()->hasVerifiedEmail())
            <a class="nav-link active" href="{{route('business.event')}}">Bounty</a>
           @endif
            <a class="nav-link active" href="{{route('business.post')}}">Post</a>
            <a class="nav-link active" href="{{route('business.profile')}}">profile</a>
            
          </nav>


          <div class="col-auto col-lg-5 text-right">
            <h4 class="nav-link text-red d-lg-inline-block mr-4 " style="text-transform:uppercase;color:#00ff2b;">{{Auth::user()->role}}</h4>
          <div class="dropdown show d-lg-inline-block ">

     <a class="dropdown-toggle " data-toggle="dropdown">

    @if(Auth::user()->userbusiness->image)
      <img src="{{ asset('profile/business/img/'.Auth::user()->userbusiness->image) }}" class="rounded-circle" alt="profil pic" height="40" width="40">
      @else
        <img src="{{ asset('assets/img/hacker/profiletop.png') }}" class="rounded-circle" alt="profil pic" height="40" width="40">

      @endif

  
  
     </a>

     <div class="dropdown-menu bg" aria-labelledby="dropdownMenuLink">
    <a class="nav-link bg" href="{{ route('logout')}}">Logout</a>
   
    </div>
    
          <span class="active ml-5" style=" color:magenta; font-weight: bold;">{{Auth::user()->name}}</span>
        {{--   <a class="active ml-5" href="{{ route('logout')}}">Logout</a> --}}
    </div>
  </div>
        </section>

    


      </div>
    </nav><!-- /.navbar -->


  @yield('header')

  @yield('content')

    <!-- Footer -->
     <footer class="footer text-white bg-dark ">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-md-12 text-center mb-5">
              <div class="nav nav-bold nav-uppercase justify-content-center ">
              
                 <a class="nav-link" href="#">term and condition</a>
                <a class="nav-link" href="#">hacker</a>
                <a class="nav-link" href="#">business</a>

                <a class="nav-link" href="{{ route('contactus')}}">Contact Admin</a>
              </div>
            </div>

            <div class="col-md-12 text-center ">
              <div class="social social-bg-dark">
                <a class="social-facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="social-twitter" href="#"><i class="fab fa-twitter"></i></a>
                <a class="social-instagram" href="#"><i class="fab fa-instagram"></i></a>
                <a class="social-youtube" href="#"><i class="fab fa-youtube"></i></a>
                <a class="social-dribbble" href="#"><i class="fab fa-dribbble"></i></a>
              </div>
            </div>

            <div class="col-12 text-center">
              <br>
              <small>© hacke4me 2020, All rights reserved.</small>
            </div>

          </div>
        </div>
      </footer><!-- /.footer -->
   <!-- /.footer -->



    <script src="{{ asset('assets/js/page.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
   
    @yield('script')
    @include('sweetalert::alert')

  
  </body>
</html>
