
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
                            	<form method="post" action="{{ route('admin.categories.update',$category->id) }}">
                            		@csrf
                            		@method('PUT')

                            	   <div class="form-group">
                            	   	<label for="name">Category</label>
                            	   	<input type="text" name="name" class="form-control " value="{{$category->name}}">
                            	   </div>
                            	   <input   type="submit"  class="btn btn-primary d-lg-inline-block" value="update">
                                </form>
                              
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
</style>
@endsection

