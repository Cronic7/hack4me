@extends('layouts.admin.app')


@section('content')
<div class="clearfix"></div>
<div id="right-panel" class="right-panel">

<div class="content">

 @if($errors->any())

         
           
              @foreach($errors->all() as $error)
                 <div class="alert alert-danger" role="alert">
                        {{ $error}}
                 </div>
              @endforeach
          
          
         @endif

        @if(session()->has('success'))
           <div class="alert alert-success" role="alert">
                        {{ session()->get('success')}}
                 </div>
        @endif
         @if(session()->has('error'))
           <div class="alert alert-danger" role="alert">
                        {{ session()->get('error')}}
                 </div>
        @endif
     
            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="col-lg-10  mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Gallery title table</strong>
                                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add title to gallery</button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th >#</th>
                                          <th >title Name</th>
                                          <th>cover Image</th>
                                          <th>action</th>
                                        
                                      </tr>
                                  </thead>
                                  <tbody>

                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td><img src="{{ asset('gallery/cover/'.$category->cover_image)}}" height="50" width="50"></td>
                                        <td><a class=" btn btn-secondary btn-sm d-lg-inline-block"  href="{{route('admin.gallery-category.edit',$category->id) }}">edit</a>
                                          <a class=" btn btn-primary btn-sm d-lg-inline-block"  href="{{route('admin.gallery-image.show',$category->id) }}">view</a>
                                     
                                
                                          <form method="post" action="{{ route('admin.gallery-category.destroy',$category->id)}}" class="d-lg-inline-block">
                                            @csrf
                                            @method('DELETE')
                                        <input type="submit" class=" btn btn-danger btn-sm d-inline-block "  value="Delete">
                                     </form>
                                      </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

              
              </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div>







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('admin.gallery-category.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        
        
            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" name="title" class="form-control">
              
            </div>
            <div class="form-group">
              <label for="name">Cover image</label>
              <input type="file" name="cover_image" class="form-control">
              
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>




@endsection




@section('script')


<script type="text/javascript">
  
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
@endscript