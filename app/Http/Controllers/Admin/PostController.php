<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post; 
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

           
          return view('admin.post.post')->with('posts',Post::where('status','active')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.post.insertpost')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
      
          
            
           $rules=['title'=>'required|unique:posts',

                    'description'=>'required',
                    'content'=>'required',
                    'image'=>'mimes:jpeg,png,jpg,gif,svg|max:2048|required',
                    'category_id'=>'required',
                    'published_at'=>'required',
                      
           ];

           $this->validate($request,$rules);

            if($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time()."_".$file->getClientOriginalName();
            $file_location = public_path('post/img');

            $file->move($file_location, $file_name);
               
            
          }

           Post::create([
                            'title'=>$request->title,
                            'content'=>$request->content,
                            'description'=>$request->description,
                          
                            'user_id'=>auth()->user()->id,
                             'category_id'=>$request->category_id,
                             'status'=>'active',
                             'image'=>$file_name,
                             'published_at'=>$request->published_at





           ]);

          session()->flash('success','post created successfully');
           return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
          // $posts=Post::findOrFail($id);

        

          return view('admin.post.insertpost')->with('posts',$post)->with('categories',Category::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {

          $rules=[
                   'file'=>'mimes:jpeg,png,jpg,gif,svg|max:2048',
                    

          ];
          $this->validate($request,$rules);
        
            if(file_exists(public_path().'/post/img/'.$post->image)) 
                {
                 unlink(public_path().'/post/img/'.$post->image);
                } 

        $data=$request->only(['title','description','content','category_id','published_at']);
     
        if($request->hasFile('image'))
             {   $file=$request->file('image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('post/img/',$filename);
                $data['image']=$filename;


             }


          


        $post->update($data);


        session()->flash('success','Post updated successfully');
           return redirect(route('admin.posts.index'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post  $post)
    {

        // unlink(public_path().'/post/img/'.$post->image);
        $post->forceDelete(); 

        session()->flash('success','post Deleted successfully');
           return redirect()->back();

    }

    public function pendingpost()
        {
          return view('admin.post.pending')->with('posts',Post::where('status','pending')->get());
       }

        public function approvepost(Post $post)

              {   
                  $data['status']="active";
                  $post->update($data);
                  session()->flash('success','Post has been approved');
                     return view('admin.post.pending')->with('posts',Post::where('status','pending')->get());

              }

          public function trash(Post $post)
            {
                 $data['status']="trash";
                  $post->update($data);
                  session()->flash('success','Post has been trash');
                     return view('admin.post.pending')->with('posts',Post::where('status','pending')->get());


            } 

            public function restorepost(Post $post)
            {
                 $data['status']="active";
                  $post->update($data);
                  session()->flash('success','Post has been restored');
                     return view('admin.post.trash')->with('posts',Post::where('status','trash')->get());


            } 

             public function showtrash()
            {
            $post=Post::where('status','trash')->get();
            return view('admin.post.trash')->with('posts',$post);
             }


             public static function activepost()
             {
                return Post::where('status','active')->count();
             }

             public static function pendingposts()
             {
                return Post::where('status','pending')->count();
             }

             public static function trashpost()
             {
                return Post::where('status','trash')->count();
             }       
   }
