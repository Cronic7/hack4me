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
                                <strong class="card-title">Pending Post Table</strong>
                               
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Image</th>
                                        
                                            <th>tittle</th>
                                            <th>category</th>
                                            
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td class="serial">{{ $loop->iteration }}.</td>
                                            <td >
                                           
                                                    <img src="{{  asset('post/img/'.$post->image)}}" height="50" width="50">
                                              
                                            </td>
                                            <td> {{$post->title}}</td>
                                            <td>  <span class="name">{{$post->category->name}} </span> </td>
                                            
                                           
                                            <td>
                                              

                                          
                                              
                                                <form method="post" action="{{route('admin.approve.post',[$post->id])}} " class="d-lg-inline-block">
                                                    @csrf
                                                  
                                                 <button type="submit" class=" btn btn-danger btn-sm d-inline-block">approve</button>
                                             </form>


                                                <form method="post" action="{{route('admin.trash.post',[$post->id]) }}" class="d-lg-inline-block">
                                                    @csrf
                                                  
                                                   
                                                 <button type="submit" class=" btn btn-info btn-sm d-inline-block">Trash</button>
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

@endsection


@section('script')

@endsection