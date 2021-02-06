<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicons -->
    
    <link rel="icon"  href="{{ asset('assets/img/logo/business1.png') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    @yield('css')
  </head>

  <body>

   <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">
      

         <div class="navbar-left ml-3">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{route('business.dashboard')}}">
           <img class="logo-light " src="{{ asset('assets/img/logo-hacke4me.png') }}" alt="logo">
            <img class="logo-dark" src="{{ asset('assets/img/resize-logo.png') }}" alt="logo">
          </a>
        </div>

          <section class="navbar-mobile">
            <nav class="nav nav-navbar mr-auto">
              <a class="nav-link active" href="{{route('hacker.dashboard')}}">Home</a>
                @if(Auth::user()->hasVerifiedEmail())
                <a class="nav-link active" href="{{route('hacker.event.show')}}">event and bounty</a>
                @endif
              <a class="nav-link active" href="{{route('hacker.post')}}">Blog</a>
              <a class="nav-link active" href="{{route('hacker.profile')}}">Profile</a>
            </nav>  

      </section>
       <div class="col-auto col-lg-5 text-right navbar-right">
            <h4 class="nav-link text-red d-lg-inline-block mr-4 " style="color:#00ff2b; text-transform: uppercase;">{{Auth::user()->role}}</h4>
          <div class="dropdown show d-lg-inline-block ">

     <a class="dropdown-toggle " data-toggle="dropdown">
      
    @if(Auth::user()->userhacker->image)
      <img src="{{ asset('profile/hacker/img/'.Auth::user()->userhacker->image) }}" class="rounded-circle" alt="profil pic" height="40" width="40">
      @else
        <img src="{{ asset('assets/img/hacker/profiletop.png') }}" class="rounded-circle" alt="profil pic" height="40" width="40">

      @endif

  
  
     </a>

     <div class="dropdown-menu bg" aria-labelledby="dropdownMenuLink">
    <a class="nav-link bg" href="{{ route('logout')}}">Logout</a>
   
    </div>
    
          <span class="active ml-5" style=" font-weight: bold; color: black; text-transform: uppercase; ">{{Auth::user()->name}}</span>
    </div>
  </div>


         

    
      </div>
    </nav><!-- /.navbar -->


    @yield('header')
   @yield('content')



   @include('front.hacker.footer')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/page.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


   @yield('script')
  </body>
</html>

