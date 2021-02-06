<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BountyCategory;

class BountyCategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('admin.bounty.category')->with('categories',BountyCategory::all());
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
          
         $this->validate($request,[
                'name'=>'required|unique:bounty_categories'
        ]);
         BountyCategory::create([

                    'name'=>$request->name
         ]);
          session()->flash('success','Category added success fully');
          return redirect(route('bounties.index'));
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

         $category= BountyCategory::findOrFail($id);

      return view('admin.bounty.edit-category')->with('categories',$category);
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
          
//          $flight = App\Flight::find(1);

// $flight->name = 'New Flight Name';

// $flight->save();


         $data=BountyCategory::find($id);
       
         $data->name=$request->name;
        $data->save();

         // BountyCategory::where('id',$category)->update($data);
           session()->flash('success','data successfully updated');
          return redirect(route('bounties.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {

           $item = BountyCategory::where('id', $category)->delete();

        
    

      session()->flash('success',"deleted successfully");
     return redirect()->back();
    }
}
