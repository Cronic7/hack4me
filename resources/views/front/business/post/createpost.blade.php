@extends('layouts.front.business')


    <!-- Navbar -->
 @section('header')
         <header class="header text-center text-white" style="background-image: url({{asset('assets/img/business/bg3.jpg')}})">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto mt-7 mb-7">

            <h1>Create Post</h1>
            

          </div>
        </div>

      </div>
    </header><!-- /.header -->
    <!-- END Header -->

 @endsection

 @section('content')
  
  <main class="main-content bg-gray head mb-4">
       

      <div class="container mt-8">
        <h2 class="mt-6 mb-0"><center >!.....Create a post as business.....!</center></h2>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
                 {{ session()->get('success')}}
              </div>
              @endif
    
        <div class="row">



          <div class="col-md-8 col-xl-9 py-90">
            <div class="row gap-y">
              
             <div class="col-md-9 mt-8 ">

                       <form method="post" action="{{route('business.posts.store')}}" enctype="multipart/form-data">
                        @csrf
                                             
                 <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" value="{{old('title')}}">
                  @foreach($errors->get('title') as $message )
                   <small><p class="Error">**{{$message}}</p></small>
                   @endforeach
                 </div>

                 <div class="form-group">
                   <label for="description">Description</label>
                   <textarea name="description" class="form-control" rows="3" cols="3">{{old('description')}}</textarea>
                     @foreach($errors->get('description') as $message )
                   <small><p class="Error">**{{$message}}</p></small>
                   @endforeach
                 </div>
            



                  <div class="form-group">
               
                 
                     <label for="content" >Content</label>
                 
                
                  <input id="content" type="hidden" name="content" class="form-control" value="{{old('content')}}" rows="5" cols="5">
                  <trix-editor input="content" ></trix-editor>
                 
                          @foreach($errors->get('content') as $message )
                   <small><p class="Error">**{{$message}}</p></small>
                   @endforeach

                   </div>


                                 <div class="form-group">
                                       <label for="published-at">Published At</label>
                                           
                              
                                             <input type="text" class="form-control" name="published_at" id="published_at"  value="">
                                              @foreach($errors->get('published_at') as $message )
                                              <small><p class="Error">**{{$message}}</p></small>
                                              @endforeach
                                             
                                          
                                     </div>

                                     <div class="form-group">
                                       <label for="image">Image</label>
                                       <input type="file" name="image" class="form-control">
                                        @foreach($errors->get('image') as $message )
                                       <small><p class="Error">**{{$message}}</p></small>
                                         @endforeach
                                     </div>

                                     <div class="form-group">
                                      <label for="category">Category</label>
                                       <select name="category_id" class="form-control">
                                        <option disabled selected >--plz select--</option>
                                        @foreach($categories as $category)
                                        <option  value="{{$category->id}}" @if (old('category_id')==$category->id) selected @endif  >{{$category->name}}</option>
                                       @endforeach
                                        </select>
                                         @foreach($errors->get('category') as $message )
                                        <small><p class="Error">**{{$message}}</p></small>
                                         @endforeach
                                     </div>

                                     <button type="submit" class="btn btn-primary mt-2" style="width: 100%; height: 6%;">Post</button>

                       </form>
           
             </div>







      
             </div>   
          </div>



          <div class="col-md-4 col-xl-3 mt-0">
            <div class="sidebar ">

              <h6 class="sidebar-title ">About</h6>
              <p class="fs-12">TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.</p>

                <hr>
            </div>
          </div>

        </div>
      </div>
    </main>
    


 @endsection

 @section('css')

  <style type="text/css">
    .jit{
           width: 100%;
    }
    label {
    font-weight: 500;
    font-size: 20px;
    letter-spacing: .5px;
    margin-bottom: 5px;
    color: black;
}
.head h2{ 
     color: purple;

} 
input[type=text],[type=file],textarea ,select{
                   border-radius: 5px;
                    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #E5E5E5;
    
    box-shadow: 0 0 10px #E8E8E8 inset;
}
.Error{
    font-style: italic; color: red; margin-left:5px; font-size:15px
}
 .contents , button {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #E5E5E5;
    border-radius: 5px;
    box-shadow: 0 0 10px #E8E8E8 inset;
  
    
  
}


  </style>
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

