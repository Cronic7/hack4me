@extends('layouts.admin.app')

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
                    <form method="post" action="{{ route('admin.signup')}}">
                    	@csrf
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="name">
                        </div>
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
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="social-login-content">
                            
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{route('admin.show.login')}}"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
</body>
@endsection