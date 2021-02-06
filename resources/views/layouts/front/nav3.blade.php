<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/page.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{ asset('assets/img/original.png') }}">
    @yield('css')
  </head>

  <body>
     <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{route('index')}}">
           <!--  <img class="logo-dark" src="../assets/img/logo-dark.png" alt="logo" -->
           
             <img class="logo-light" src="{{ asset('assets/img/logo-hacke4me.png') }}" alt="logo">
          </a>
        </div>

       <section class="navbar-mobile">
          <nav class="nav nav-navbar ml-auto">
            <a class="nav-link active" href="{{route('index')}}">Home</a>
             <a class="nav-link active" href="#">FOR Hacker</a>
            <a class="nav-link active" href="#">FOR Business</a>
           
            <!-- <a class="nav-link active" href="#">Evemtd</a> -->
            <a class="nav-link active" href="{{route('gallery')}}">Gallery</a>
            <a class="nav-link active" href="{{route('post')}}">Blog</a>
          </nav>
        </section>

      </div>
    </nav><!-- /.navbar -->

      @yield('header')
       @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/page.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

  </body>
</html>
