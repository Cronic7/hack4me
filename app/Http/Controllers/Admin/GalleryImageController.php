<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GalleryImage;
use App\GalleryCategory;

class GalleryImageController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request, $id)
    {
            
            $rule=[
                    'image' => 'required',
                    'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];

            $this->validate($request,$rule);

             $data = $request->all();

        $data['gallery_category_id'] = $id;

        if($request->hasFile('image')) 
        {


            $all_images = $request->file('image');

            for($i=0; $i<count($all_images); $i++) 
            {
                $file = $all_images[$i];
                $file_name = time() . "_" . $file->getClientOriginalName();
                $file_location = public_path('gallery/image');

                if ($file->move($file_location, $file_name)) 
                {
                    $data['image'] = $file_name;
                    $data['slug']=str_slug($file_name);
                    GalleryImage::create($data);
                }

            }



        }

         session()->flash('success', 'Gallery inserted Successfully');
            return redirect()->route('admin.gallery-image.show',$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
         $category=GalleryCategory::findorFail($id);
        return view('admin.gallery.gallery-image')->with('galleries',GalleryImage::where('gallery_category_id',$id)->get())->with('category',$category);     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            GalleryImage::where('id', $id)->delete();

        return redirect()->back();
    }
}
