<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Category;
use Auth;
use Session;


class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Store_Erp.asset.index')->with('assets', Asset::all());

    }

    public function showList($id)
    {
        $assets=Asset::where('asset_category_id', $id)->get();
        $category = Category::find($id);
        return view('Store_Erp.asset.list')->with('assets', $assets)
                                           ->with('category', $category);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('Store_Erp.asset.create')->with('categories', $categories);
    }

    public function categoryAsset($id)
    {
        $category = Category::find($id);
        return view('Store_Erp.asset.categoryAsset')->with('category', $category);
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
            'asset_name' => 'required|max:255',
            'asset_detail'=> 'required|max:500',
            'addToCategory'=> 'required', 
            'quantity'=> 'required',
            'unit_price'=> 'required',
            'total_price'=> 'required'

        ]);

        $user_id=Auth::User()->id;

        $asset = Asset::create([
            'asset_name'=>$request->asset_name,
            'asset_category_id'=>$request->addToCategory,
            'asset_description'=>$request->asset_detail,
            'asset_quantity'=>$request->quantity,
            'asset_unit'=>$request->unit,
            'asset_unit_price'=>$request->unit_price,
            'asset_total_price'=>$request->total_price,
            'created_by'=>$user_id,
        ]);
      
        $asset->save();
        Session::flash('success',' Asset Added Successfully!');
        return redirect()->back();
    }

    public function categoryStore(Request $request, $id)

    {
            $this->validate($request, [
                'asset_name' => 'required|max:255',
                'asset_detail'=> 'required|max:500',
                'quantity'=> 'required',
                'unit_price'=> 'required',
                'total_price'=> 'required'
    
            ]);
    
            $user_id=Auth::User()->id;
    
            $asset = Asset::create([
                'asset_name'=>$request->asset_name,
                'asset_category_id'=>$id,
                'asset_description'=>$request->asset_detail,
                'asset_quantity'=>$request->quantity,
                'asset_unit'=>$request->unit,
                'asset_unit_price'=>$request->unit_price,
                'asset_total_price'=>$request->total_price,
                'created_by'=>$user_id,
            ]);
          
            $asset->save();
            Session::flash('success',' Asset Added Successfully!');
            return redirect()->route('asset.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTrash()
    {
        return view('Store_Erp.trash.asset')->with('assets', Asset::onlyTrashed()->get());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset=Asset::find($id);
        return view('Store_Erp.asset.edit')->with('asset', $asset);
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
        $asset = Asset::find($id);

        $asset->asset_name=$request->name;
        $asset->asset_description=$request->description;
        $asset->asset_quantity=$request->quantity;
        $asset->asset_unit=$request->unit;
        $asset->asset_unit_price=$request->unit_price;
        $asset->asset_total_price=$request->total_price;

        $asset->save();
        Session::flash('success',' Asset Updated Successfully!');
        return redirect()->route('asset.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $asset = Asset::find($id);
        $asset ->delete();
        Session::flash('success',' Asset Trashed Successfully!');
        return redirect()->back();
    }

    public function restore($id)
    {
        $asset = Asset::withTrashed()->where('id', $id)->first();
        $asset->restore();
        Session::flash('success',' Asset Restored Successfully!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $asset = Asset::withTrashed()->where('id', $id)->first();
        $asset ->forceDelete();
        Session::flash('success',' Asset Destroyed Successfully!');
        return redirect()->back(); 
    }
}
