<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GalleryCategory;

class GalleryCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallery.gallery-category')->with('categories',GalleryCategory::all());

       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rule=[
                   'title'=>'unique:gallery_categories,name|required',
                   'cover_image'=>'mimes:jpeg,png,jpg,gif,svg|max:2048|required'
            ];
                
          $this->validate($request,$rule);
              if($request->hasFile('cover_image')) 
              {
            $file = $request->file('cover_image');
            $file_name = time()."_".$file->getClientOriginalName();
            $file_location = public_path('gallery/cover');

            $file->move($file_location, $file_name);
               
            
          }

            

             GalleryCategory::create([
             	'name'=>$request->title,
             	 'slug'=>str_slug($request->title),
             	'cover_image'=>$file_name

             ]);
             session()->flash('success','title is successfully added to the gallery');
             return redirect()->back();
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
    public function edit($id)
    {     
    	 
          return view('admin.gallery.edit-gallery-category')->with('category',GalleryCategory::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.;
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rule=[   'cover_image'=>'image',
                 'title'=>'unique:gallery_categories,name,'.$id,
                 
         ];  
         $this->validate($request,$rule);
          
         $data['name']=$request->title;
          $category=GalleryCategory::findOrFail($id);
        

          if($request->hasFile('cover_image'))
          { 
          	
          	 if($category->cover_image)
         	 {
                unlink(public_path().'/gallery/cover/'.$category->cover_image);
         	 }
          } 
          if($request->hasFile('cover_image'))
          { $file=$request->file('cover_image');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('gallery/cover/',$filename);
                $data['cover_image']=$filename;

          }
         

          GalleryCategory::where('id',$id)->update($data);
          session()->flash('success','Gallery updated');
          return redirect(route('gallery-category.index'));
  
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  $category=GalleryCategory::findOrFail($id);
        
        if($category->images->count()>0)
        {
            session()->flash('error',"Category cannot be deleted because it has some posts");
          return redirect()->back();
        }  

       $category->delete();

      session()->flash('success',"deleted successfully");
      return redirect(route('gallery-category.index'));
        
    }
}
