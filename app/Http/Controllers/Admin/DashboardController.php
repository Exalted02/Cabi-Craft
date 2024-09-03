<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
	{
		$totalOrderSale = Order::sum('grand_total');
		// today's sale
		$todayDate = date('Y-m-d');
		$todayOrderSale = Order::where('invoice_date',$todayDate)->sum('grand_total');
		
		// one day before sale 
		$dateonedaybefore = Carbon::now()->subDay(); // one day before date
		$onedaybeforeDate = $dateonedaybefore->toDateString(); // This will give you the date in YYYY-MM-DD format
        
		// yesturday sale
		$yesturdayOrderSale = Order::where('invoice_date',$onedaybeforeDate)->sum('grand_total');
		
		// this month sale
		$thismonthOrderSale = Order::whereYear('invoice_date', date('Y'))
        ->whereMonth('invoice_date', date('m'))
        ->sum('grand_total');
		
		// last month sale
		//$dateonedaybefore = Carbon::now()->subDay();
		$lastmonthSale = Order::whereBetween('invoice_date', 
                                    [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
                                )->sum('grand_total');
								
		// total order count
		$tot_order = Order::count('id');
		// total pending order 
		$order_pending = Order::where('status',1)->count('id');
		// total processing
		$order_processing = Order::where('status',5)->count('id');
		// order delivered
		$order_dispatched = Order::where('status',7)->count('id');
		
		//------- for chart -----
		
		// Get weekly sales data from the database
		$weeklySales = Order::selectRaw('DATE(invoice_date) as week_start_date, SUM(grand_total) as total_sales')
			->where('invoice_date', '>=', Carbon::now()->subWeek()->startOfWeek())
			->groupBy('week_start_date')
			->orderBy('week_start_date')
			->get();
        //echo "<pre>";print_r($weeklySales);die;
		// Format data for Chart.js
		$labels = $weeklySales->pluck('week_start_date')->map(function ($date) {
			return Carbon::parse($date)->format('Y-m-d');
		})->toArray();

		$salesData = $weeklySales->pluck('total_sales')->toArray();
		
		//---------- for pie chart calculation ------------
		$totalOrders = Order::count();
		// Get counts for each status
		$confirmOrdersCount = Order::where('status', 9)->count();
		$manufacturingOrdersCount = Order::where('status', 5)->count();
		$cancelOrdersCount = Order::where('status', 10)->count();
		$completedOrdersCount = Order::where('status', 8)->count();
		// Calculate percentages
		$confirmOrdersPercentage = ($confirmOrdersCount / $totalOrders) * 100;
		$manufacturingOrdersPercentage = ($manufacturingOrdersCount / $totalOrders) * 100;
		$cancelOrdersPercentage = ($cancelOrdersCount / $totalOrders) * 100;
		$completedOrdersPercentage = ($completedOrdersCount / $totalOrders) * 100;
		
		$data = ['labels' => ['Confirm order', 'Order processing', 'Cancel order', 'Complete order'],
            'data' => [$confirmOrdersPercentage, $manufacturingOrdersPercentage, $cancelOrdersPercentage, $completedOrdersPercentage],
        ];
		
		//-------------------------------------------------
                                
		return view('admin.dashboard.dashboard', compact('totalOrderSale','yesturdayOrderSale','todayOrderSale','thismonthOrderSale','lastmonthSale','tot_order','order_pending','order_processing','order_dispatched','labels', 'salesData','data'));
	}
}
