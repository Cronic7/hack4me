@extends('layouts.admin.app')


@section('content')

<div class="clearfix"></div>
<div id="right-panel" class="right-panel">

<div class="content"> 

       
            <div class="animated fadeIn">
                <div class="row">

         @if(session()->has('success'))
          <div class="alert alert-success" role="alert">
                                       {{ session()->get('success')}}
        </div>
        @endif
                    
                         <div class="col-lg-11">
                        <div class="card">
                            <div class="card-header">
                              @if(isset($posts))


                                      <strong>Edit</strong> post
                              @else
                          
                               <strong>Create</strong> post

                              @endif

                          

                                
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ isset($posts)?route('admin.posts.update',$posts->id):route('admin.posts.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                      @if(isset($posts))

                                      @method('PUT')
                                      @endif
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tittle</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title" placeholder="Tittle" class="form-control" value="{{isset($posts)?$posts->title:''}}">
                                            <small class="form-text text-muted" >
                                                @foreach($errors->get('title') as $message)
                                                <P style="color: red; font-style: italic;">{{ $message }}</P>   
                                                @endforeach
                                            </small>
                                        </div>
                                    </div>
                                 
                              
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="textarea-input" rows="6" placeholder="Content..." class="form-control">{{isset($posts)?$posts->description:''}}</textarea>
                                              @foreach($errors->get('description') as $message)
                                                <P style="color: red; font-style: italic;">{{ $message }}</P>   
                                                @endforeach
                                        </div>
                                    </div>


               <div class="row form-group">
               
                   <div class="col-md-3">
                     <label for="content" class="form-control-label">content</label>
                 </div>
                 <div class="col-md-9">
                  <input id="content" type="hidden" name="content" class="form-control" value="{{isset($posts)?$posts->content:'  '}}">
                  <trix-editor input="content"></trix-editor>
                 
                  @foreach($errors->get('content') as $message)
                                                <P style="color: red; font-style: italic;">{{ $message }}</P>   
                                                @endforeach
              </div>

               </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Category</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="category_id" id="select" class="form-control" selected >
                                                
                                              @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                @if(isset($posts))
                                                   @if($category->id==$posts->category_id)
                                                     selected

                                                    @endif
                                                @endif



                                                  >{{ $category->name}}</option>
                                                @endforeach
                                             
                                            </select>

                                            @foreach($errors->get('category') as $message)
                                                <P style="color: red; font-style: italic;">{{ $message }}</P>   
                                                @endforeach
                                        </div>
                                    </div>




                                     <div class="row form-group">
                                         <div class="col col-md-3"><label for="published-at">Published At</label></div>
                                           <div class="col-12 col-md-9">
                              
                                             <input type="text" class="form-control" name="published_at" id="published_at"  value="">
                                              <small class="form-text text-muted" >
                                                @foreach($errors->get('published_at') as $message)
                                                <P style="color: red; font-style: italic;">{{ $message }}</P>   
                                                @endforeach
                                            </small>

                                            </div>
                                     </div>
                                
                                    <div class="row form-group">
                                  <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image</label></div>
                                        <div class="col-12 col-md-9">
                                            @if(isset($posts))
                                          <div class="mb-3 mt-3">
                                           
 
                                          <img src="{{asset('post/img/'.$posts->image)}}" alt="no img">
                  

                                          </div>
                                           @endif


                                          <input type="file" id="file-input" name="image" class="form-control-file">
                                          @foreach($errors->get('file') as $message)
                                                <P style="color: red; font-style: italic;">{{ $message }}</P>   
                                                @endforeach
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" name="" class="form-control btn btn-primary col col-md-3 ml-5 mx" value="{{isset($posts)?'Update':'Create'}}">
                                  
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>


@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
  <script >
         flatpickr('#published_at',{enableTime:true})

                          // In your Javascript (external .js resource or <script> tag)
                 $(document).ready(function() {
                     $('.tags-selector').select2();
                   });
</script>

@endsection