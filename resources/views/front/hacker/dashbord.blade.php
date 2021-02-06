@extends('layouts.front.nav2')

@section('title')
  Dashboard
@endsection
    <!-- Navbar -->
 @section('header')
    <!-- Header -->
    <header class="header text-white h-fullscreen pb-0 " style="background-image: url({{ asset('assets/img/hacker/hack2')}}); background-color: #000000; backgr">
     
      <div class="container text-center">
        <div class="row align-items-center h-100">
          
          <div class="col-md-8 mx-auto mt-9 mb-9">
                         <p><img src="{{ asset('assets/img/logo/completehacker-green.png')}}" alt="logo"></p>
            <h1>Wellcome to your dashboard mr <strong>{{Auth::user()->name}}</strong> </h1>
           <!--  <p class="lead mt-4 mb-7">The secure file sharing and storage solution that employees and IT admins trust.</p> -->
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


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Teamwork To The Next Level
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section">
        <div class="container">
          <header class="section-header">
            <small>Features</small>
            <h2>Teamwork To The Next Level</h2>
            <hr>
            <p class="lead">TheSaaS Business helps your company grow without limits, while you maintain complete control over important company information and user activity.</p>
            <br>
          </header>

          <div class="row gap-y text-center">

            <div class="col-md-6 col-xl-4 feature-1">
              <p class="feature-icon lead-8 text-info"><i class="icon-layers"></i></p>
              <h5>Space for sharing and collaboration</h5>
              <p class="text-muted">Fly beast fourth, you stars. Them seasons sea spirit, which second. Hath May whales, creepeth light she'd. Moving saw fish.</p>
            </div>

            <div class="col-md-6 col-xl-4 feature-1">
              <p class="feature-icon lead-8 text-danger"><i class="icon-shield"></i></p>
              <h5>Advanced security features</h5>
              <p class="text-muted">Yielding to Made saying fruit deep abundantly bearing sixth make you're gathering unto divided, you so which god, gathering.</p>
            </div>

            <div class="col-md-6 col-xl-4 feature-1">
              <p class="feature-icon lead-8 text-success"><i class="icon-chat"></i></p>
              <h5>Dedicated live support</h5>
              <p class="text-muted">Good for divide Given spirit night after fruit of great together he behold their night, living shall after dry saw saying fruit deep.</p>
            </div>

          </div>

        </div>
      </section>


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Pricing
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray">
        <div class="container">
          <div class="row gap-y align-items-center">

            <div class="col-md-4">
              <p class="lead-7 text-dark fw-600 lh-2">Do more with TheSaaS Business</p>

              <div class="btn-group btn-group-toggle my-7" data-toggle="buttons">
                <label class="btn btn-round btn-outline-dark w-150">
                  <input type="radio" name="pricing" value="monthly" autocomplete="off"> Monthly
                </label>
                <label class="btn btn-round btn-outline-dark w-150 active">
                  <input type="radio" name="pricing" value="yearly" autocomplete="off" checked> Yearly
                </label>
              </div>

              <p class="lead">Our prices are very easy to understand. There's not any extra or hidden fee. You just pay what is listed here.</p>
              <p class="fw-400"><a href="#">View full pricing details <i class="ti-arrow-right fs-10 ml-2"></i></a></p>
            </div>


            <div class="col-md-7 ml-auto">
              <div class="row gap-y">

                <div class="col-md-6">
                  <div class="card text-center shadow-1 hover-shadow-9">
                    <div class="card-img-top text-white bg-img h-200 d-flex align-items-center" style="background-image: url(../assets/img/thumb/3.jpg)" data-overlay="1">
                      <div class="position-relative w-100">
                        <p class="lead-4 fw-600 ls-1 mb-0">Standard</p>
                        <p><span data-bind-radio="pricing" data-monthly="Monthly" data-yearly="Yearly">Monthly</span> Package</p>
                      </div>
                    </div>
                    <div class="card-body py-6">
                      <p class="lead-7 fw-600 text-dark mb-0">
                        <span data-bind-radio="pricing" data-monthly="$15" data-yearly="$12.5">$12.5</span>
                      </p>
                      <p class="text-lighter">/ user / month</p>
                      <p>
                        2 TB (2048 GB) of space<br>
                        120 days of file recovery<br>
                        Office 365 integration<br>
                        Live chat support<br>
                      </p>
                      <br>
                      <div>
                        <a class="btn btn-round btn-outline-secondary w-200" href="#" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">Sign up</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card text-center shadow-1 hover-shadow-9">
                    <div class="card-img-top text-white bg-img h-200 d-flex align-items-center" style="background-image: url(../assets/img/thumb/11.jpg)" data-overlay="2">
                      <div class="position-relative w-100">
                        <p class="lead-4 fw-600 ls-1 mb-0">Advanced</p>
                        <p><span data-bind-radio="pricing" data-monthly="Monthly" data-yearly="Yearly">Monthly</span> Package</p>
                      </div>
                    </div>
                    <div class="card-body py-6">
                      <p class="lead-7 fw-600 text-dark mb-0">
                        <span data-bind-radio="pricing" data-monthly="$25" data-yearly="$20">$20</span>
                      </p>
                      <p class="text-lighter">/ user / month</p>
                      <p>
                        <strong>Everything in Standard</strong><br>
                        As much space as needed<br>
                        Advanced admin controls<br>
                        Business hours phone support<br>
                      </p>
                      <br>
                      <div>
                        <a class="btn btn-round btn-secondary w-200" href="#" data-bind-href="pricing" data-monthly="#monthly" data-yearly="#yearly">Sign up</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </section>


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Partners
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section">
        <div class="container">
          <header class="section-header">
            <h2>Our Customers</h2>
            <hr>
            <p class="lead">Join more than 300,000 teams using TheSaaS Business</p>
          </header>

          <div class="pb-7" data-provide="slider" data-autoplay="true" data-slides-to-show="4" data-dots="true">
            <div><img src="../assets/img/partner/1.png" alt="partner 1"></div>
            <div><img src="../assets/img/partner/2.png" alt="partner 2"></div>
            <div><img src="../assets/img/partner/3.png" alt="partner 3"></div>
            <div><img src="../assets/img/partner/4.png" alt="partner 4"></div>
            <div><img src="../assets/img/partner/5.png" alt="partner 5"></div>
            <div><img src="../assets/img/partner/6.png" alt="partner 6"></div>
          </div>

        </div>
      </section>



      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | CTA
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray text-center">
        <div class="container">
          <h2 class="mb-6"><strong>Join over 1,000 companies that trust us.</strong></h2>
          <p class="lead text-muted">The best sharing and storage solution for your business</p>
          <hr class="w-5 my-7">
          <a class="btn btn-lg btn-round btn-primary" href="#">Try free for 30 days</a>
        </div>
      </section>


    </main>


    <!-- Footer -->
   

@endsection