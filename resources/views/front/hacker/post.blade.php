@extends('layouts.front.nav2')

@section('title')
  Post
@endsection
    <!-- Navbar -->
 @section('header')
         <header class="header text-center text-white" style="background-image: url({{ asset('assets/img/hacker/bg2.jpg.')}}); background-color: #000000;">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Post</h1>
            <p class="lead-2 opacity-90 mt-6">See the latest blog post of <span class="text-primary" data-typing="@foreach($posts as $post){{$post->title}}, @endforeach" data-back-speed="100"></span></center></h1></p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->
    <!-- END Header -->

 @endsection

 @section('content')
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
             
               @forelse($posts as $post)
                <div class="col-md-6">
                  <div class="card border hover-shadow-6 mb-6 d-block">
                    <a href="{{route('hacker.singlepost',$post->id)}}"><img class="card-img-top" src="{{asset('post/img/'.$post->image) }}" alt="Card image cap"></a>
                    <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" >{{$post->category->name}}</a></p>
                      <h5 class="mb-0"><a class="text-dark" href="{{route('hacker.singlepost',$post->id)}}">{{$post->title}}}</a></h5>
                    </div>
                  </div>
                </div>
                 @empty

                      <p class="text-center">
                       <center> No result found for search......<strong>{{ request()->query('search')}}</strong> </center>
                        
                      </p>
                  @endforelse


               

              </div>

          {{ $posts->appends(['search'=>request()->query('search')])->links()}}
           <!--    <nav class="flexbox mt-30">
                <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
              </nav> -->
            </div>



            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">
                @if(Auth::user()->hasVerifiedEmail())
                <h6 class="sidebar-title"><a href="{{route('hacker.posts.create')}}" class="btn btn-primary mb-2">Create post</a></h6>
                @endif
                <h6 class="sidebar-title">Search</h6>
                <form class="input-group" action="{{route('hacker.post')}}" method="GET">
                  <input type="text" class="form-control" name="search" placeholder="search" value="{{request()->query('search')}}">
                  <div class="input-group-addon">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                  </div>
                </form>

                <hr>

                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                	@foreach($categories as $category)
                  <div class="col-6"><a href="{{route('hacker.post.category',$category->id)}}">{{$category->name}}</a></div>
                     @endforeach
                </div>

                <hr>

                <h6 class="sidebar-title">Top posts</h6>
                 @foreach($posts as $post)
                <a class="media text-default align-items-center mb-5" href="{{route('hacker.singlepost',$post->id)}}">
                  <img class="rounded w-65px mr-4" src="{{asset('post/img/'.$post->image) }}">
                  <p class="media-body small-2 lh-4 mb-0">{{$post->title}}</p>
                </a>
                @endforeach

                <hr>

           

                <h6 class="sidebar-title">About</h6>
                <p class="small-3">Post here is information posted by user hacker and user business as well as supre admin you can see post related to the technology and many other once you post here your post will be queue in admin pannel and until admin approve you can't see your post</p>


              </div>
            </div>

          </div>
        </div>
      </div>
    </main>

 


 @endsection

 @section('css')
<style type="text/css">
  .card-img-top{
      height: 250px;
      width: 400px;

  }
</style>

 @endsection


 @section('script')
   


 @endsection

