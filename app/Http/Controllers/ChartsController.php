<?php

namespace App\Http\Controllers;

use App\Charts\AllOrdersChart;
use Illuminate\Http\Request;
use App\Category;
use App\Asset;
use App\Order;
use Charts;
use DB;

class ChartsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function getAllMonths()
    {
        $months_array= array();
        $orders_dates = Order::pluck('created_at');
        $orders_dates = json_decode($orders_dates, true);

       if (! empty($orders_dates))
       {
           foreach ($orders_dates as $unformatted_date){
               $date = new \DateTime($unformatted_date);
               $month_no= $date->format('m');
               $month_name = $date->format('M');

                $months_array[$month_no] = $month_name;
           }
       }
       return $months_array;

    }

    function getMonthlyOrderCount($month)
    {
        $monthly_order_count= Order::whereMonth('created_at', $month)->get()->count();
        $approved_order_count= Order::whereMonth('order_status', 'approved')->get()->count();
        $ongoing_order_count= Order::whereMonth('order_status', 'ongoing')->get()->count();
        $rejected_order_count= Order::whereMonth('order_status', 'rejected')->get()->count();

        return $monthly_order_count;
    }

    function getApprovedOrderCount($month)
    {
        $approved_order_count= Order::whereMonth('created_at', $month)->where('order_status', 'approved')->get()->count();
 

        return $approved_order_count;
    }
    
    function getOngoingOrderCount($month)
    {
        $ongoing_order_count= Order::whereMonth('created_at', $month)->where('order_status', 'ongoing')->get()->count();

        return $ongoing_order_count;
    }

    function getRejectedOrderCount($month)
    {
        $rejected_order_count= Order::whereMonth('created_at', $month)->where('order_status', 'rejected')->get()->count();

        return $rejected_order_count;
    }

    function getOrdersMonthlyData()
    {
        $monthly_order_data_array = array();
        $monthly_order_count_array=array(); 
        $approved_order_count_array=array();
        $ongoing_order_count_array=array();
        $rejected_order_count_array=array();
        $months_array = $this->getAllMonths();
        $month_name_array =array();
        if(! empty($months_array))
        {
            foreach ($months_array as $month_no=> $month_name)
            {
                $monthly_order_count = $this->getMonthlyOrderCount($month_no);
                $approved_order_count = $this->getApprovedOrderCount($month_no);
                $ongoing_order_count = $this->getOngoingorderCount($month_no);
                $rejected_order_count = $this->getRejectedOrderCount($month_no);
                array_push($monthly_order_count_array, $monthly_order_count);
                array_push($approved_order_count_array, $approved_order_count);
                array_push($ongoing_order_count_array, $ongoing_order_count);
                array_push($rejected_order_count_array, $rejected_order_count);
                array_push($month_name_array, $month_name);
            }
        }

        // $max_no=max($monthly_order_count_array);
        // $max = round(($max_no + 10/2)/10)*10;
        $months_array = $this->getAllMonths();
        $monthly_order_data_array = array(
            'months' => $month_name_array,
            'order_count' => $monthly_order_count_array,
            'approved' => $approved_order_count_array,
            'ongoing' => $ongoing_order_count_array,
            'rejected' => $rejected_order_count_array
            // 'max' => $max)
        );

            $admin_order_chart= new AllOrdersChart;
            $admin_order_chart->labels($months_array);
            $admin_order_chart->dataset('All orders', 'line', $monthly_order_count_array);

            return $monthly_order_data_array;

    }





    public function index()
    {
        //
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
        //
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
        //
    }
}
