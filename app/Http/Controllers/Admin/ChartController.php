<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ChartController extends Controller
{
    public function chart()
    {
        $years = DB::table('orders')
                ->selectRaw('YEAR(created_at) as year')
                ->distinct()
                ->get();

        return view('admin.chart.index', compact('years'));
    }

    public function statistic(Request $request) 
    {
        $year = $request->year;
        $quantity = [];
        $month = [];
        $statistics = DB::table('orders')
            ->selectRaw('count(id) as quantity, MONTH(created_at) as month')
            ->whereYEAR('created_at', $year)
            ->groupBY(DB::raw('MONTH(created_at)'))
            ->get();

        foreach ($statistics as $statistic ) {
            $quantity[] = $statistic->quantity;
            $month[] = $statistic->month;
        }

        return response()->json([
            'quantity' => $quantity,
            'month' => $month,
        ]);
    }
}
