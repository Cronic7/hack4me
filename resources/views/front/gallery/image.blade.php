@extends('layouts.front.home')
@section('title')
{{$category->name}}
@endsection
@section('header')
<header class="header custome-header head" style="background-image: url); background-color: #000000;">
</header><!-- /.header -->
<!-- END Header -->
@endsection
@section('content')
<div class="main custome-main">
    <center>
        <h2><u>{{$category->name}}</u></h2>
    </center>
    <hr>
    <div class="row mt-0">
        <div class="gallery">
            <div class="gallery gallery-4-type4" data-provide="photoswipe">
                @forelse($images as $image)
                <div class="col-md-4 img">
                    <a class="gallery-item custome-gallery-item" href="{{ asset('gallery/image/'.$image->image)}}" data-provide="photoswipe">
                        <img src="{{ asset('gallery/image/'.$image->image)}}" alt="...">
                    </a>
                </div>
                @empty
                <p>
                    <center class="ml-7">no images on this categiory</center>
                </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
body {
    background-color: #f1f1f1;

    font-family: Arial;
}

</style>
@endsection
@section('script')
@endsection
