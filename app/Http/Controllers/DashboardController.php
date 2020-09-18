<?php

namespace App\Http\Controllers;
use App\Category;
use App\Order;
use App\Asset;
use App\User;
use Auth;
use Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::User()->id;
        $myRequests = Order::where('employee_id', $user_id)->get()->count();
        return view('Store_Erp.adminDashboard')->with('categories', Category::all()->count())
                                               ->with('assets', Asset::all()->count())
                                               ->with('requests', Order::all()->count())
                                               ->with('myRequests', $myRequests);
    }
    public function mydashboard(){

        $user_id = Auth::User()->id;
        $requests = Order::where('employee_id', $user_id)->get()->count();
        return view('Store_Erp.mydashboard')->with('requests', $requests);
    }
}
