


@extends('layouts.front.nav3')


@section('title')
     reset password
@endsection


@section('content')   

    <!-- Main Content -->
    <main class="main-content bg-black">


      <section class="section bg-black">
           
        <div class="container">
            
             @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

          <center>  <h2 class="color-white">Change your password</h2><center>
    
     

           <br>
          
             <div class="row gap-y">


            <div class="col-md-4 mx-auto">
            
                   
                   

              <form method="post" action="{{ route('password.update') }}">
                @csrf
                 <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                <label class="color-white size-16 float-left" for="email">Email address</label>
                <input class="form-control" type="text" placeholder="Email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        
              @error('email')                      
                <small style="color:red; font-style: italic;" class="float-left">***{{$message}}</small>
               @enderror                     
              </div>

               <div class="form-group">
                  <label class="color-white size-16 float-left" for="password">New Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}" required autocomplete="new-password">
                @error('password')                      
                <small style="color:red; font-style: italic;" class="float-left">***{{$message}}</small>
               @enderror
              </div>
              

               <div class="form-group">
                <label class="color-white size-16 float-left" for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password_confirmation" value="{{old('password')}}" required autocomplete="new-password">
              </div>

                 



                <br>            
                
              
              <center class="mt-"> <button class="btn btn-primary" type="submit" >Change Password</button></center>
          
               
              </form>


            
            </div>


          

          </div>


        </div>
      </section>

    </main>
    @endsection


    @section('css')
   
    @endsection