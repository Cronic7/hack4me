


@extends('layouts.front.nav3')


@section('title')
     forget password
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

          <center>  <h2 class="color-white">Enter your email to reset password</h2><center>
    
     

           <br>
          
             <div class="row gap-y">


            <div class="col-md-4 mx-auto">
            
                        
                   

              <form method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                <label class="color-white size-16 float-left" for="email">Email address</label>
                <input class="form-control" type="text" placeholder="Email" name="email">
                        
              @error('email')                      
                <small style="color:red; font-style: italic;" class="float-left">***{{$message}}</small>
               @enderror                     
                              
                  

                </div>
                <br>            
                
              
              <center class="mt-"> <button class="btn btn-primary" type="submit" >send link</button></center>
          
               
              </form>


            
            </div>


          

          </div>


        </div>
      </section>

    </main>
    @endsection


    @section('css')
    <style type="text/css">
       
          
          
    </style>
    @endsection