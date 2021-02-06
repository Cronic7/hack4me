@extends('layouts.front.home')
@section('title')
Gallery
@endsection
@section('header')
<header class="header head" style="background-image: url); background-color: #000000;">
</header><!-- /.header -->
<!-- END Header -->
@endsection
@section('content')
<!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Block 7
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
<section class="section bg-gray">
    <div class="container">
        <div class="row gap-y">
            <div class="col-lg-6">
                <h3>Contact Us</h3>
                <br>
                <form action="{{ route('contactus.store') }}" method="POST" >
                  @csrf
                   @if(session()->has('success'))
                    <div class="alert alert-success d-on-success">
                      {{session()->get('success')}}
                    </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                            <small style="color: red">{{$errors->first('name') }}</small>
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Email" value="{{old('email')}}">
                           <small style="color: red">{{ $errors->first('email') }}</small> 
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-lg" rows="4" placeholder="Message" name="message">{{old('message')}}</textarea>
                        <small style="color: red">{{ $errors->first('message') }}</small>
                    </div>
                    <button class="btn btn-sm btn-danger" type="submit">Send message</button>
                </form>
            </div>
            <div class="col-lg-4 ml-auto text-center text-lg-left">
                <hr class="d-lg-none">
                <h3>Find Us</h3>
                <br>
                <p>Bhaktapur sallaghari <br>sallaghari chock</p>
                <p>+01 076-550173<br>+9779807590188</p>
                <p>hackeforme@gmail.com</p>
            </div>
            <>
        </div>
    </div>
</section>
<!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Block 8
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
@endsection
@section('css')
<style type="text/css">
.header {

    padding-top: 0px;
    padding-bottom: 90px;
}

</style>
@endsection
