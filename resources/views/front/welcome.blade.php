@extends('layouts.front.home')



  <!-- Navbar -->
  @section('title')

   Home Page
  @endsection
   
 @section('header')

    <!-- Header -->
    <header class="header text-white h-fullscreen" style="background-image: url(assets/img/bg/1.jpg) ">
      <div class="overlay opacity-90" style="background-color: #563d7c"></div>

      <div class="container text-center">

        <div class="row h-100">
          <div class="col-lg-8 mx-auto align-self-center">

            <p><img src="{{ asset('assets/img/logo/completehacker.png')}}" alt="logo"></p>
            <h1 class="display-4 my-6"><strong>Hacker For me</strong></h1>
            <p class="lead-3">The <b>most popular</b> Site of finding bug and enhancing hacking skill </p>
             <hr class="w-80px">
               <p>
              <a class="btn btn-xl btn-round btn-outline-light w-250" href="{{ route('index.signup')}}">join us now</a>
             
            </p>
           

           

          </div>
        </div>

      </div>
    </header><!-- /.header -->
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content">

     
        <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Features
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray overflow-hidden">
        <div class="container-fluid">
          <div class="row gap-y align-items-center">

            <div class="col-md-4 mx-auto text-center">
              <img class="border shadow-7" src="{{asset('assets/img/hacker/user/sajan.jpg')}}" alt="..." data-aos="fade-right">
            </div>


            <div class="col-md-4 mx-auto">
              <h3>Sajan Rai</h3>
              <p>The TheSaaS experience loved by over 500 million users, with powerful collaboration and anytime anywhere access to your files.</p>
              <a href="#">My profile <i class="ti-angle-right fs-10 ml-1"></i></a>
            </div>

          </div>
        </div>
      </section>


      <section class="section overflow-hidden">
        <div class="container-fluid">
          <div class="row gap-y align-items-center">

            <div class="col-md-4 mx-auto text-center">
              <img class="border shadow-7" src="{{asset('assets/img/hacker/user/anup.jpg')}}" alt="..." data-aos="fade-left">
            </div>


            <div class="col-md-4 mx-auto order-md-first">
              <h3>Mr jit Bdr rana</h3>
              <p>Keep your company’s data where it belongs with extensive security and administration features.</p>
              <a href="#">My profile<i class="ti-angle-right fs-10 ml-1"></i></a>
            </div>

          </div>
        </div>
      </section>


      <section class="section bg-gray overflow-hidden">
        <div class="container-fluid">
          <div class="row gap-y align-items-center">

            <div class="col-md-4 mx-auto text-center">
              <img class="border shadow-7" src="{{asset('assets/img/hacker/user/patrck.jpg')}}" alt="..." data-aos="fade-right">
            </div>


            <div class="col-md-4 mx-auto">
              <h3>patrick  shrestha</h3>
              <p>Organizations like Hyatt, News Corp, and National Geographic trust us to meet their security, compliance, and privacy needs.</p>
              <a href="#">My profile <i class="ti-angle-right fs-10 ml-1"></i></a>
            </div>

          </div>
        </div>
      </section>
      


      <section id="options" class="section">
        <div class="container">
          <header class="section-header">
            <h2>OUR ACHIEVEMENT </h2>
           
          </header>


          <div class="row gap-y text-center">
            <div class="col-6 col-lg-4">
              <p>USER HACKER</p>
            <h2 data-provide="countup" data-from="0" data-to="{{$hacker}}"></h2>
            </div>

            <div class="col-6 col-lg-4">
              <p>USER BUSINESS</p>
            <h2 data-provide="countup" data-from="0" data-to="{{$business}}" data-duration="10"></h2>
            </div>

            <div class="col-6 col-lg-4">
              <p>BLOG POST</p>
            <h2 data-provide="countup" data-from="0" data-to="{{$post}}" data-duration="5"></h2>
            </div>

            <div class="col-6 col-lg-4">
              <p>EVENT POST</p>
              <h2 data-provide="countup" data-from="0" data-to="122" data-duration="10" data-use-easing="false"></h2>
            </div>

            <div class="col-6 col-lg-4">
              <p>BOUNTY POST</p>
            <h2 data-provide="countup" data-from="0" data-to="{{$bounty}}"></h2>
            </div>

            <div class="col-6 col-lg-4">
              <p>SUSCRIBER USER</p>
              <h2 data-provide="countup" data-from="0" data-to="541" data-suffix="M"></h2>
            </div>

          </div>


        </div>
      </section>


     
     <!--  |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Built with TheSaaS
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !--> 
      <section class="section bg-gray pb-0 overflow-hidden">
        <div class="container">
          <header class="section-header">
            
            <h2>TOP BUSINESS</h2>
            <hr>
            <p class="lead">Thank you for using our platform to improve your security</p>
          </header>


          <div class="row gap-y text-center">

            <div class="col-md-4 d-flex flex-column">
              <div class="mb-7">
                <p class="text-info lead-7 mb-0">100+</p>
                <p>Components</p>
              </div>
              <div class="px-5 mt-auto">
                <img class="shadow-4 opacity-80" src="{{ asset('assets/img/preview/header-color.jpg') }}" alt="..." data-aos="slide-up"  data-aos-delay="300">
              </div>
            </div>

            <div class="col-md-4 d-flex flex-column">
              <div class="mb-7">
                <span class="text-info lead-7">6.7x</span><br>
                <p>Faster</p>
              </div>
              <div class="mt-auto">
                <img class="shadow-6" src="{{ asset('assets/img/preview/header-gradient.jpg') }}" alt="..." data-aos="slide-up">
              </div>
            </div>

            <div class="col-md-4 d-flex flex-column">
              <div class="mb-7">
                <span class="text-info lead-7">12</span><br>
                <p>Colors</p>
              </div>
              <div class="px-5 mt-auto">
                <img class="shadow-4 opacity-80" src="{{ asset('assets/img/preview/header-typing.jpg') }}" alt="..." data-aos="slide-up" data-aos-delay="600">
              </div>
            </div>

          </div>

        </div>
      </section>


    </main>

@endsection


