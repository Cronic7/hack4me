<?php

namespace App\Http\Controllers\hacker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post; 
use App\Category;

class CreatePostController extends Controller
{
   public function __construct()
    {
        $this->middleware('verified');
    }   
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('front.hacker.post.createpost')->with('categories',Category::all());
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
                             'status'=>'pending',
                             'image'=>$file_name,
                             'published_at'=>$request->published_at





           ]);

          session()->flash('success','post created successfully');
           return redirect(route('hacker.posts.create'));
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
           return redirect(route('posts.index'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post  $post)
    {
        $post->forceDelete(); 
        session()->flash('success','post Deleted successfully');
           return redirect(route('posts.index'));

    }



}
