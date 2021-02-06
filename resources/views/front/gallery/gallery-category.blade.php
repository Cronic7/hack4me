@extends('layouts.front.home')
@section('title')
Gallery
@endsection
@section('header')
<header class="header custome-header head" style="background-image: url); background-color: #000000;">
</header><!-- /.header -->
<!-- END Header -->
@endsection
@section('content')
<div class="main custome-main">
    <h2>Gallery</h2>
    <p>Welcome to the gallery ,you can browse our past memories and different from here</p>
    <hr>
    <!-- Portfolio Gallery Grid -->
    <div class="row">
        @foreach($categories as $category )
        <div class="col-md-4">
            <a href="{{route('gallery.image',$category->slug)}}">
                <div class="contain-custome">
                    <img src="{{asset('gallery/cover/'.$category->cover_image)}}" class="image custome-image" height="150" width="150">
                    <div class="custome-overlay">
                        <div class="text-custome">{{ $category->name}}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <!-- END GRID -->
    </div>
</div>
@endsection
@section('css')
<style>
body {
    backgrou nd-color: #f1f1f1;

    font-family: Arial;
}

</style>
@endsection
@section('script')
@endsection
