
@extends('layouts.admin.app')


@section('content')
<div class="clearfix"></div>
<div id="right-panel" class="right-panel">

<div class="content"> 

       
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-lg-10  mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Category edit</strong>
                               
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('admin.gallery-category.update',$category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                   <div class="form-group">
                                    <label for="name">title name</label>
                                    <input type="text" name="title" class="form-control " value="{{$category->name}}">
                                    @foreach($errors->get('title') as $message )
                                   <small class="red ">***{{$message}}</small> 
                                   @endforeach
                                   </div>
                                  

                                     <label for="name">Change Cover image</label> 
                                   
                                   <div class="form-group">
                                     <img src="{{asset('gallery/cover/'.$category->cover_image)}}" class="" height="150" width="150">
                                     
                                    <input type="file" name="cover_image" class="form-control">
                                     @foreach($errors->get('cover_image') as $message )
                                   <small class="red ">***{{$message}}</small> 
                                   @endforeach
                                   </div>
                                   <input   type="submit"  class="btn btn-primary d-lg-inline-block" value="update">
                              
                        </div>
                    </div>
                </div>

              
              </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div>






@endsection


@section('css')

<style type="text/css">
    .form-control {
                 
               width: 60%;

                 }
                .red{
                    color:red;
                    font-style: italic;
                }
</style>
@endsection

