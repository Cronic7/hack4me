@extends('layouts.front.business')

@section('title')
  Profile
@endsection

@section('content')
   <main class="main-content">
        <section class="section section-custome ">
             <header class="section-header">
            <h2><u>{{isset($hackers)?"Hacker profile":"Profile"}}</u></h2>
             @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
           
           
          </header>
        <div class="container profile mt-0 ">

          <div class="row m-4">
            


            <div class="col-md-8 mt-3">
             
              <ul class="project-detail ">
                <li>
                  <strong><h5><b>Name</b></h5></strong>
                  <span>{{isset($hackers)?$hackers->name: $datas->name}}</span>
                </li>

                <li>
                   <strong><h5><b>EMAIL</b></h5></strong>
                  <span>{{isset($hackers)?$hackers->email:$datas->email}}</span>
                </li>

                <li>
                <strong><h5><b>ADDRESS</b></h5></strong>
                  <span>
                    {{isset($hackers)?$hackers->userhacker->address:$datas->userbusiness->address}}

                  </span>
                </li>

                
                  @if(!isset($hackers))
                  <li>
                <strong><h5><b>Company</b></h5></strong>
                  <span>
                    {{$datas->userbusiness->company_name}}

                  </span>
                </li>
                @endif

                <li>
                <strong><h5><b>Username</b>
                   
                      @foreach($errors->get('username') as $message )
                       <small class="error" >**{{$message}}</small>
                   @endforeach
                  </h5></strong> 
                  <span>{{isset($hackers)?$hackers->userhacker->username:$datas->userbusiness->username}}</span>
                </li>

                 <li>
             <strong><h5><b>Account</b></h5></strong>
                  @if(Auth::user()->hasVerifiedEmail())
                  <a href="http://thetheme.io/thesaas">verified</a>
                  @else
                   <a href="{{route('verification.resend')}}">Not verified click here to send verification link</a>
                  @endif
                </li>
               
              </ul>
        <strong><h5><b>Bio</b></h5></strong>

              <p>{{isset($hackers)?$hackers->userhacker->bio:$datas->userbusiness->bio}}</p>

              @if(!isset($hackers))
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit profile</button>
              @endif

            </div>
            <div class="col-md-4 mb-6 mb-md-0 mt-3">
                   @if(!isset($hackers))
                   @if($datas->userbusiness->image)
               <img src="{{ asset('profile/business/img/'.$datas->userbusiness->image)}}">
                 @foreach($errors->get('image') as $message )
                       <small class="error" >**{{$message}}</small>
                   @endforeach

           
            @else
              <img src="{{ asset('assets\img\hacker\profile.png')}}" alt="project image">
            @endif
            @endif
                      @if(isset($hackers))
                          @if($hackers->userhacker->image)
                        <img src="{{ asset('profile/hacker/img/'.$hackers->userhacker->image)}}">
                      
                      @else
                       <img src="{{ asset('assets\img\hacker\profile.png')}}" alt="project image">
                      @endif

                      
                      @endif


               <br>
               <br>
               <br>

                  @if(isset($hackers))
                 
                   <strong><h5><b>Rate</b></h5></strong>
                   
               
                  @php
                  for($i=0;$i<$checked_rate;$i++)
                  {
                    @endphp
                     <span class="fa fa-star checked"></span>

                     @php
                  }
                   for($i=0;$i<$unchecked_rate;$i++)
                  {

                  @endphp

                    <span class="fa fa-star unchecked"></span>

                    @php
                      }
                    @endphp


                  @endif
                      
                 

            </div>
          </div>

        </div>
      </section>

    

  </main>

    <!-- modal section -->
    @if(!isset($hackers))
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('business.profile.update',[$datas->userbusiness->id]) }}" enctype="multipart/form-data">
          @csrf
         
          <div class="row">
             <div class="col-md-6">
          <div class="form-group">
            <label for="Username">Username</label>
              <input type="text" name="username" class="form-control" value="{{$datas->userbusiness->username}}">


               
          </div>

           <div class="form-group">
            <label for="Username">Company</label>
              <input type="text" name="company_name" class="form-control" value="{{$datas->userbusiness->company_name}}">


               
          </div>

            <div class="form-group">
            <label for="Username">address</label>
              <input type="text" name="address" class="form-control" value="{{$datas->userbusiness->address}}">


               
          </div>
          <div class="form-group">
            <label for="bio">Bio data</label>
             <textarea type="text" name="bio" id="bio" class="form-control" rows="8" cols="8">{{$datas->userbusiness->bio}}</textarea>
          </div>
          </div>
          <div class="col-md-6">
            <label for="file">Profile picture</label>

            @if($datas->userbusiness->image)
                <img src="{{ asset('profile/business/img/'.$datas->userbusiness->image)}}">

            @else
              <img src="{{ asset('assets\img\hacker\profile.png')}}" alt="project image">

            @endif
          
        
             <input type="file" name="image" class="form-control">
          </div>
          </div>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Update</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endif
   



@endsection

   <!-- Navbar -->
 @section('header')
         <header class="header mt-0 pt-0" >
    
         </header>
  

 @endsection

@section('css')
 <style type="text/css">


.checked {

    font-size: 28px;
    color: red;
}
.unchecked{
    font-size:28px;
    color:#c58e8e; 
}
      .header{
                 padding-top: 0px;
        }
        .section-header u{
             color: red;
        }

    
         .error{
               display: inline-block;
              color: red;
              font-style: italic;
              font-size: 15px;
              text-transform: none;


      }
      .navbar{
             top: 0;
            background-color: black;
      }
      .header{
                 top: 0px;
        }
         .section-custome {
          padding-top: 0px;
      }

        
  </style>


@endsection

@section('script')
 <script type="text/javascript">


      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
@endsection