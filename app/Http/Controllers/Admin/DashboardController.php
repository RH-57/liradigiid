<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     public function index() {
        $todayVisitors = Visitor::whereDate('visit_date', Carbon::today())->count();

        $visitorStats = Visitor::select(
                DB::raw('DATE(visit_date) as date'),
                DB::raw('COUNT(*) as total')
            )
            ->whereMonth('visit_date', Carbon::now()->month)   // bulan berjalan
            ->whereYear('visit_date', Carbon::now()->year)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // ambil array untuk chart
        $dates = $visitorStats->pluck('date')->toArray();
        $totals = $visitorStats->pluck('total')->toArray();

        return view('admin.dashboards.index', compact(
            'todayVisitors',
            'dates',
            'totals',
        ));
    }
}
