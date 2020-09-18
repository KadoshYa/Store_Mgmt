<?php

namespace App\Http\Controllers;

use App\Notifications\NewRequestNotification;
use App\Notifications\RequestRejectedNotification;
use App\Notifications\RequestAcceptedNotification;
use App\Notifications\LowAssetNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Asset;
use App\Order;
use Auth;
use Session;
use App\User;


class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Store_Erp.order.index')->with('requests', Order::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assets = Asset::all();
        return view('Store_Erp.order.create')->with('assets', $assets);
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
            'order_detail' => 'required|max:500',
            'asset_id'=> 'required',
            'quantity'=> 'required', 
            'urgency'=> 'required'

        ]);

        $user_id=Auth::User()->id;

        $asset = Asset::find($request->asset_id);

        $result = $asset->asset_quantity - $request->quantity;

        if($result < 2){

            Session::flash('error',' Not Enought Asset quantity for your request!');
            return redirect()->back();
            
        }
        else{
            
            $order = Order::create([
                'asset_id'=>$request->asset_id,
                'employee_id'=>$user_id,
                'order_description'=>$request->order_detail,
                'order_quantity'=>$request->quantity,
                'order_type'=>$request->urgency,
                'asset_unit_price'=>$request->unit_price,
                'request_date'=>date('Y-m-d H:i:s')
            ]);

                $asset->asset_quantity = $result;
                $asset->save();
                $admins=User::where('admin',1)->get();
                $name= $asset->asset_name;
                
                foreach ($admins as $admin){
                    if($asset->asset_quantity <= 3 )
                    {
                      User::find($admin->id)->notify(new LowAssetNotification());
                  }
                }

                $order->save();
                Session::flash('success',' Request Sent Successfully!');
                    foreach ($admins as $admin){
                        User::find($admin->id)->notify(new NewRequestNotification);
                    }
         return redirect()->back();
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMine()
    {
        $user_id = Auth::User()->id;
        $requests = Order::where('employee_id', $user_id)->get();
        return view('Store_Erp.order.myOrders')->with('requests', $requests);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request= Order::find($id);
        return view('Store_Erp.order.edit')->with('request', $request)
                                           ->with('assets', Asset::all());
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
        $order= Order::find($id);

        $order->order_description=$request->order_detail;

        if($request->asset_id)
        {
            $order->asset_id=$request->asset_id;
        }
        if($request->quantity)
        {
            $order->order_quantity=$request->quantity;
        }        

        if($request->urgency)
        {
            $order->order_type=$request->urgency;
        }

        $order->save();
        Session::flash('success',' Request Updated Successfully!');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accept($id)
    {
        $request=  Order::find($id);
        $request->order_status = "approved";
        $request->managed_by = Auth::User()->id;
        $request->save();
        User::find($request->employee_id)->notify(new RequestAcceptedNotification);
        Session::flash('success',' Request Status Updated!');
        return redirect()->back();
    }

    public function reject($id)
    {
        $request= Order::find($id);
        $request->order_status = "rejected";
        $request->managed_by = Auth::User()->id;
        $request->save();
        User::find($request->employee_id)->notify(new RequestRejectedNotification);
        Session::flash('success',' Request Status Updated!');
        return redirect()->back();
    }
}
