


@extends('layouts.front.nav3')


@section('title')
     login
@endsection


@section('content')   

    <!-- Main Content -->
    <main class="main-content bg-black">


      <section class="section bg-black">
           
        <div class="container">
            
          
          <center>  <h2 class="color-white">Login as User/Business</h2><center>
            @if(session()->has('error'))
      <div class="alert alert-danger">
        {{ session()->get('error')}}
          
      </div>
     @endif
           <br>
          
          


          <div class="row gap-y">

            <div class="col-md-4 mx-auto">
    

              <form method="post" action="{{ route('index.login.match')}}">
                @csrf
                <div class="form-group">
                <label class="color-white size-16 float-left" for="email">Email</label>
                <input class="form-control" type="text" placeholder="Email" name="email">
                  @foreach($errors->get('email') as $message )
                  <small class="color-red font-style-italic float-left">***{{$message}}</small> 
                  @endforeach
                  

                </div>
                <br>            
                  <div class="form-group">
                <label class="color-white size-16 float-left" for="password">Password</label>
                <input class="form-control" type="password" placeholder="password" name="password">
                 @foreach($errors->get('password') as $message )
                  <small class="color-red font-style-italic float-left">***{{$message}}</small> 
                  @endforeach
                  
                 
              </div>
               <br>
               <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }} >
                  <label class="custom-control-label color-white">Remember me</label>
                </div>
               <a href="{{route('password.request') }}">Forget Password ?</a>
               <a href="{{ route('index.signup')}}" class="ml-10" >signup</a>
              <center class="mt-4"> <button class="btn btn-primary" type="submit" >Login</button></center>
          
               
              </form>


            
            </div>


          

          </div>


        </div>
      </section>

    </main>


    @endsection


    @section('css')
    
    @endsection