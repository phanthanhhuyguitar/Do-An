<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $data =[];
        $totalVisitorsAndPageViews = Analytics::fetchTotalVisitorsAndPageViews(Period::days(29));
        $data["date"] = $totalVisitorsAndPageViews->pluck("date");
        $data["visitors"] = $totalVisitorsAndPageViews->pluck("visitors");
        $data["pageViews"] = $totalVisitorsAndPageViews->pluck("pageViews");
        //nguon truy cap tu dau
        $data["fetchTopReferrers"] = Analytics::fetchTopReferrers(Period::days(29));

        return view('admin.dashboard.index', $data);
    }
}
