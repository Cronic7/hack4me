
@extends('layouts.admin.app')

   
 @section('css')
    <style type="text/css">
    	.login-content {
    max-width: 450px;
    
              }
              .login-form {
    background:#e2e8db;
   
     }
     .error p{
            color: red; 
             font-style: italic;      
       }
        
    	
    </style>
    @endsection
</head>
@section('content')

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content"  alt="">
                    </a>
                </div>
                <div class="login-form">
                    @if(session()->has('error'))
                    <div class="nav-link error"><p>{{session()->get('error')}}</p></div>
                    @endif
                    <form method="post" action="{{ route('admin.login')}}">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                       
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="{{route('admin.show.signup')}}"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection



