<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Message;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $Count_users = User::count();
        $Count_categories = Category::count();
        $Count_shop = Shop::count();
        $Count_messages = Message::count();
        $Count_order = Order::count();

        
        //the sales calculations 
        $this_year = Carbon::now()->year;
        $total_sales = Order::where('status','=', 'complete')
        ->sum('total');

        //this today's sales
        $todays_sales = Order::where('status','=', 'complete')
                            ->whereDate('created_at', Carbon::today())
                            ->sum('total'); 

        //this week's sales
        $this_weeks_sales = Order::where('status','=', 'complete')
                                ->whereBetween('created_at',  [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                ->sum('total');

        //this month's Sales
        $this_month_sales = Order::where('status','=', 'complete')
                                ->whereMonth('created_at', Carbon::now()->month)
                                ->sum('total');

        //this years sales
        $this_year_sales = Order::where('status','=', 'complete')
                                ->whereYear('created_at', Carbon::now()->year)
                                ->sum('total');


        //Sales for each month of the current year
        $monthly_sales = Order::selectRaw("MONTH(created_at) as month, SUM(total) as total_sales")
            ->where('status','=', 'complete')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_sales', 'month');

        // Initialize an array to hold sales data for each month of the year
        $sales_data = [];

        // Loop through each month of the year and get sales data
        for ($month = 1; $month <= 12; $month++) {
            // Check if sales data exists for the current month
            if (isset($monthly_sales[$month])) {
                $sales_data[] = $monthly_sales[$month];
            } else {
                $sales_data[] = 0; // Set sales to 0 if no data exists for the current month
            }
        }

        //Gettin the top client from the database
        $top_customers = Order::select('user_id', DB::raw('COUNT(*) as order_count'), DB::raw('SUM(total) as total_spent'))
                                ->where('status', '=', 'complete')
                                ->groupBy('user_id')
                                ->having('order_count', '>', 3)
                                ->orderBy('order_count', 'desc')
                                ->orderBy('total_spent', 'desc')
                                ->limit(4)
                                ->get();



        return view('adminside.admin_dashboard', compact(
            'Count_users',
            'Count_categories',
            'Count_shop',
            'Count_messages',
            'Count_order',

            'todays_sales',
            'this_weeks_sales',
            'this_month_sales',
            'this_year_sales',
            'this_year',
            'sales_data',
        ));
    }
}
