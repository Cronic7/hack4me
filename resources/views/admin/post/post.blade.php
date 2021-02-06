@extends('layouts.admin.app')


@section('content')

<div class="clearfix"></div>
<div id="right-panel" class="right-panel">

<div class="content"> 

       
            <div class="animated fadeIn">

         @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
                                       {{ session()->get('success')}}
        </div>
        @endif
                <div class="row">

                    
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Active Post Table</strong>
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary  float-right">Create Post</a>
                            </div>
                            <div class="table-stats ">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                          
                                        
                                            <th >tittle</th>
                                            <th>category</th>
                                              <th colspan="10" class="mr-5">Image</th>
                                            
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td class="serial">{{ $loop->iteration }}.</td>
                                           
                                            <td> {{$post->title}}</td>
                                            <td>  <span class="name">{{$post->category->name}} </span> </td>
                                             <td colspan="10">
                                           
                                                    <img src="{{  asset('post/img/'.$post->image)}}" height="50" width="50">
                                              
                                            </td>
                                            
                                           
                                            <td>
                                              

                                            <a class=" btn btn-secondary btn-sm d-lg-inline-block"  href="{{route('admin.posts.edit',$post->id) }}">edit</a>
                                     
                                          
                                              


                                                <form method="post" action="{{route('admin.posts.destroy',$post->id)}}" class="d-lg-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                 <button type="submit" class=" btn btn-info btn-sm ">Delete</button>
                                             </form>
                                            </td>


                                    

                                        </tr>
                                    
                                         @endforeach
                                       
                                      
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>

              
              </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div>

@endsection


@section('css')
<style type="text/css">
    .table th{
        background-color: #23ff5d;
        
    }
    .table{
             border-bottom: 1px solid;
             border-color: red;
    }
</style>

@endsection


@section('script')

@endsection