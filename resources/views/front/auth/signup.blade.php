@extends('layouts.front.nav3')
@section('title')
     Signup 
@endsection

@section('content')



    <!-- Main Content -->
    <main class="main-content">
   <section class="section bg-black">
        <div class="container">
                @if(session()->has('success'))
              <div class="alert alert-success">
              {{ session()->get('success')}}
          
              </div>
     @endif
            
          <header class="section-header">
            <h2 class="color-white">Signup Form</h2>
            <hr>
            
          </header>


          <div class="row gap-y">


            <div class="col-md-6">
              <h5 class="mb-5 color-white">For Hacker</h5>

             <form method="post" action="{{ route('index.create.hacker')}}">
               @csrf
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">F</span>
                </div>
                <input type="text" class="form-control" placeholder="Full Name" name="Hname" name="name">
              </div>
               @foreach($errors->get('Hname') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach

              <br>
          
            


              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="HUsername" value="{{old('HUsername')}}">
              </div>
               @foreach($errors->get('HUsername') as $message )
                  <small class="color-red font-style-italic ">***{{$message}}</small> 
                  @endforeach
              <br>

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Email address" name="Hemail"value="{{old('Hemail')}}">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
              </div>
              
               @foreach($errors->get('Hemail') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
                
              <br>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="address" name="Haddress"value="{{old('Haddress')}}">
              </div>
                @foreach($errors->get('Haddress') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach


              <br>
               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">*</span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="Hpassword" value="{{old('Hpassword')}}">
              </div>
               @foreach($errors->get('Hpassword') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
              <br>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">*</span>
                </div>
                <input type="password" class="form-control" placeholder="Conform password" name="Hpassword_confirmation" value="{{old('password_confirmation ')}}">
              </div>
                @foreach($errors->get('password_confirmation ') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
              <br>
               <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="term">
                  <span><a href="#" class="ml-1">terms and condition</a></span>
                  <label class="custom-control-label color-white">I agree term and condition</label>
                </div>
                @foreach($errors->get('term') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
                <br>
               <button class="btn btn-primary btn-sm" type="submit" name="jit">sign up</button>
             </form>

       

            </div>


            <div class="col-md-6">
              <h5 class="mb-5 color-white">For business</h5>

                <form method="post" action="{{ route('index.create.business') }}">
                  @csrf
                      <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">F</span>
                </div>
                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{old('name')}}">
                  
              </div>
               @foreach($errors->get('name') as $message )
                  <small class="color-red font-style-italic ">***{{$message}}</small> 
                  @endforeach
             
                 <br>

               <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}">
                 
              </div>
                 @foreach($errors->get('username') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
              <br>
             
            
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">C</span>
                </div>
                <input type="text" class="form-control" placeholder="Company name" name="company_name" value="{{old('company_name')}}">
              </div> 
                  @foreach($errors->get('company_name') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach

                 <br>
                  <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">L</span>
                </div>
                <input type="text" class="form-control" placeholder="Location" name="location" value="{{old('location')}}">
              </div> 

                  @foreach($errors->get('location') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach

                 <br>

              <div class="input-group">
                <input type="text" class="form-control" placeholder="Email address" name="email" value="{{old('email')}}">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
              </div>
             
               @foreach($errors->get('email') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
            
              <br>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="telephone" name="telephone"value="{{old('telephone')}}">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
              </div>
               @foreach($errors->get('telephone') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">*</span>
                </div>
                <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
              </div>
                 @foreach($errors->get('password') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach

              <br>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">*</span>
                </div>
                <input type="password" class="form-control" placeholder="Conform Password" name="password_confirmation" value="{{old('password_confirmation')}}">
              </div>
              
              <br>

               <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="term2">
                   <span><a href="#" class="ml-1">terms and condition</a></span>
                  <label class="custom-control-label color-white">I agree term and condition</label>
                </div>
                     @foreach($errors->get('term2') as $message )
                  <small class="color-red font-style-italic">***{{$message}}</small> 
                  @endforeach
                 <br>
                <button class="btn btn-primary btn-sm" type="submit" name="business" >Sign up</button>

                </form>
         

           

            </div>



          </div>



        </div>
      </section>


     

    </main>

    <!-- --------------------------------------------------------------------------------------------------------------
             footer part
    -------------------------------------------------------------------------------------------------------------- -->

     <footer class="footer text-color-white bg-dark ">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-md-12 text-center ">
              <div class="nav nav-bold nav-uppercase justify-content-center ">
                <a class="nav-link" href="{{ route('index.login')}}">Already have acount?</a>
                

           
              </div>
            </div>

        

            <div class="col-12 text-center">
              <br>
              <small>© hacke4me 2020, All rights reserved.</small>
            </div>

          </div>
        </div>
      </footer><!-- /.footer -->

   @endsection 

   
    @section('css')
    
    @endsection