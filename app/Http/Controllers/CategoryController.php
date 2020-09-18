<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use Session;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

 

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Store_Erp.category.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Store_Erp.category.create');
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:255',
            'category_detail'=> 'required|max:500',
        ]);

        $user_id=Auth::User()->id;

        $category = Category::create([
            'name'=>$request->category_name,
            'description'=>$request->category_detail,
            'created_by'=>$user_id,
            'color'=>$request->category_color
        ]);
      
        $category->save();
        Session::flash('success',' Category Added Successfully!');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTrash()
    {
        return view('Store_Erp.trash.category')->with('categories', Category::onlyTrashed()->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('Store_Erp.category.edit')->with('category', $category);
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
        $category = Category::find($id);

        $category->name=$request->name;
        $category->description=$request->description;
        $category->color=$request->category_color;
        $category->save();
        Session::flash('success',' Category Updated Successfully!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category ->delete();
        Session::flash('success',' Category Trashed Successfully!');
        return redirect()->back();
    }
    public function restore($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->restore();
        Session::flash('success',' Category Restored Successfully!');
        return redirect()->back();        
    }
    public function destroy($id)
    {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category ->forceDelete();
        Session::flash('success',' Category Destroyed Successfully!');
        return redirect()->back(); 
    }


}

