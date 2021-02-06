@extends('layouts.front.nav2')

@section('title')

  profile
@endsection

@section('content')
    <!-- Main Content -->
  <main class="main-content bg-costume">
        <section class="section bg-costume">
             <header class="section-header">
              <p class><strong style="font-size: 35px" >My profile</strong></p>
             @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
           
          </header>
        <div class="container  border-costume ">

          <div class="row m-4">
            


            <div class="col-md-8 mt-3">
             
              <ul class="project-detail ">
                <li>
                  <strong><h5><b>Name</b></h5></strong>
                  <span>{{$datas->name}}</span>
                </li>

                <li>
                   <strong><h5><b>eMAIL</b></h5></strong>
                  <span>{{$datas->email}}</span>
                </li>

                <li>
                <strong><h5><b>ADDRESS</b></h5></strong>
                  <span >
                    {{$datas->userhacker->address}}

                  </span>
                </li>
                <li>
                <strong><h5><b>Username</b>
                   
                      @foreach($errors->get('username') as $message )
                       <small class="error" >**{{$message}}</small>
                   @endforeach
                  </h5></strong> 
                  <span>{{$datas->userhacker->username}}</span>
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

              <p>{{$datas->userhacker->bio}}</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit profile</button>

            </div>
            <div class="col-md-4 mb-6 mb-md-0 mt-3">
                @if($datas->userhacker->image)
               <img src="{{ asset('profile/hacker/img/'.$datas->userhacker->image)}}">
                 @foreach($errors->get('file') as $message )
                       <small class="error" >**{{$message}}</small>
                   @endforeach

           
            @else
              <img src="{{ asset('assets\img\hacker\profile.png')}}" alt="project image">
               @endif
               <br>
               <br>
               <br>
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

                  
                

            </div>
          </div>

        </div>
      </section>

    

  </main>

    <!-- modal section -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg">
      <div class="modal-header">
        <h5 class="modal-title white" id="exampleModalLabel">Edit profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('hacker.profile.update',[$datas->userhacker->id]) }}" enctype="multipart/form-data">
          @csrf
         
          <div class="row">
             <div class="col-md-6">
          <div class="form-group">
            <label for="Username" class="white">Username</label>
              <input type="text" name="username" class="form-control" value="{{$datas->userhacker->username}}">


               
          </div>
          <div class="form-group">
            <label for="bio" class="white">Bio data</label>
             <textarea type="text" name="bio" id="bio" class="form-control" rows="8" cols="8">{{$datas->userhacker->bio}}</textarea>
          </div>
          </div>
          <div class="col-md-6">
            <label for="file" class="white">Profile picture</label>

            @if($datas->userhacker->image)
                <img src="{{ asset('profile/hacker/img/'.$datas->userhacker->image)}}">

            @else
              <img src="{{ asset('assets\img\hacker\profile.png')}}" alt="project image">

            @endif
          
        
             <input type="file" name="file" class="form-control">
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

   


@endsection

@section('header')
 <header class="header text-white   pt-0 t-0 " >
     
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
                 top: 0px;
        }
        .section-header u{
             color: black;
             font-style: italic;
        }

     /* .border-costume{
               border:1px solid;
               border-color: green;
               border-radius: 1px;
      }*/
      .bg-costume

      {  background-color: #efeee5;
      }  
         .navbar{
             top: 0;
            background-color: black;
      }
      
      .section {
          padding-top: 0px;
      }
      .section-header{
        margin-bottom:35px; 
      }
      .error{
               display: inline-block;
              color: red;
              font-style: italic;
              font-size: 15px;
              text-transform: none;


      }
  .bg{
       background-color: black;
    }
  .white{
       color: white;
  }
  body{
      background-color: #efeee5;
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



