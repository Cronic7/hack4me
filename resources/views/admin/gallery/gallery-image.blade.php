@extends('layouts.admin.app')


@section('content')

<div id="right-panel" class="right-panel">

<div class="content pt-0">

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
     
            <div class="animated fadeIn card">
              <div class="card-header">
                      <h4>{{$category->name}}</h4>
                      <span class="float-right"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">upload photo</button></span>
                      </h4>
                  </div>
                  <div class="card-body">
                <div class="row ">
                    
                    @forelse($galleries as $gallery)

                    <div class="col-md-4 contain mt-4">
                      <img src="{{asset('gallery/image/'.$gallery->image)}}">
                      
                 
  
                    <span class="but">
                      <form method="post" action="{{route('admin.gallery-image.destroy',$gallery->id)}}">
                        @csrf

                        <button type="submit">Delete</button>
                       </form> 
                    </span>
                   

                    </div>
                      @empty
                       <center>  no image in this title you can upload by clicking top right button </center>

                      @endforelse

                   
                    
                    
                    
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
        <h5 class="modal-title" id="exampleModalLabel">Add image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('admin.gallery-image.store',$category->id)}}" enctype="multipart/form-data">
        @csrf
      
      <div class="modal-body">
        
        
            <div class="form-group">
              <label for="name">Cover image</label> 
              <input type="file" name="image[]" class="form-control" multiple>
              
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

@section('css')

<style>
  .contain {
  position: relative;
  margin-top: 0px;
  width: 250px;
  height: 250px;
}





 .contain img {
  position: absolut;
  width: 260;
  height: 260px;
  left: 0;
}



.contain:hover .tit {
  top: 100px;
}

.but{
  position: absolute;
  width: 250px;
  left:20;
  top: 150  ;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
}

.but button {
  width: 200px;
  padding: 12px 48px;
  text-align: center;
  color: white;
  border: solid 2px white;
  z-index: 1;

    background-color: Transparent;
 
}

.contain:hover .but {
  opacity: 1;
}

</style>
@endsection