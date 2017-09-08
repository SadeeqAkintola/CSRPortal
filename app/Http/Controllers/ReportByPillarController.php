<?php

namespace App\Http\Controllers;

use App\Division;
use App\ProjectDetails;
use App\ReportByPillar;
use Illuminate\Http\Request;

class ReportByPillarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function highchart() {

//
            $pillarReportData = ReportByPillar::all();
//
//            $Value = $pillarReportData->TotalCost;
//            $Name = $pillarReportData->Pillar;
//
//            $response = array(
//                'status' => 'success',
//                'jantina' => $jantina,
//                'user_count' => $user_count
//            );







    return view ( 'reports/report-by-pillar/index', ['pillarReportData' => $pillarReportData]);

    }

}


//$visitor = DB::table('visitor')
//    ->select(
//        DB::raw("year(created_at) as year"),
//        DB::raw("SUM(click) as total_click"),
//        DB::raw("SUM(viewer) as total_viewer"))
//    ->orderBy("created_at")
//    ->groupBy(DB::raw("year(created_at)"))
//    ->get();
//
//$result[] = ['Year','Click','Viewer'];
//foreach ($visitor as $key => $value) {
//    $result[++$key] = [$value->year, (int)$value->total_click, (int)$value->total_viewer];
//}
//
//return view('google-line-chart')
//    ->with('visitor',json_encode($result));

