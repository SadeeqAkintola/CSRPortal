<?php

namespace App\Http\Controllers;

use App\Division;
use App\ProjectDetails;
use App\ReportByPlant;
use Illuminate\Http\Request;

class ReportByPlantController extends Controller
{
    public function highchart() {
//
//        $y2003Details = ReportByPlant::where ( 'year', '2003' )->get ();
//        $y2004Details = ReportByPlant::where ( 'year', '2004' )->get ();
//        $y2005Details = ReportByPlant::where ( 'year', '2005' )->get ();
//
//        $y2006Details = ReportByPlant::where ( 'year', '2006' )->get ();
//        $y2007Details = ReportByPlant::where ( 'year', '2007' )->get ();
//        $y2008Details = ReportByPlant::where ( 'year', '2008' )->get ();
//        $y2009Details = ReportByPlant::where ( 'year', '2009' )->get ();
//        $y2010Details = ReportByPlant::where ( 'year', '2010' )->get ();
//        $y2011Details = ReportByPlant::where ( 'year', '2011' )->get ();
//        $y2012Details = ReportByPlant::where ( 'year', '2012' )->get ();
//        $y2013Details = ReportByPlant::where ( 'year', '2013' )->get ();
//        $y2014Details = ReportByPlant::where ( 'year', '2014' )->get ();
//        $y2015Details = ReportByPlant::where ( 'year', '2015' )->get ();
//
////        $y2016Details = ReportByPlant::where ( 'year', '2016' )->get ();
////        $y2017Details = ReportByPlant::where ( 'year', '2017' )->get ();
//
//        $divisionNames = ReportByPlant::select ( 'division' )->groupBy ( 'division' )->get ();
//
////        dd($y2006Details );
//        $chartArray ["chart"] = array (
//            "type" => "line"
//        );
//        $chartArray ["title"] = array (
//            "text" => "Yearly sales"
//        );
//        $chartArray ["credits"] = array (
//            "enabled" => false
//        );
//        $chartArray ["xAxis"] = array (
//            "categories" => array ()
//        );
//        $chartArray ["tooltip"] = array (
//            "valueSuffix" => "N"
//        );
//
//        $categoryArray = array (
//            '2003',
//            '2004',
//            '2005',
//            '2006',
//            '2007',
//            '2008',
//            '2009',
//            '2010',
//            '2011',
//            '2012',
//            '2013',
//            '2014',
//            '2015'
//        );
//        $y2003 = [ ];
//        $y2004 = [ ];
//        $y2005 = [ ];
//        $y2006 = [ ];
//        $y2007 = [ ];
//        $y2008 = [ ];
//        $y2009 = [ ];
//        $y2010 = [ ];
//        $y2011 = [ ];
//        $y2012 = [ ];
//        $y2013 = [ ];
//        $y2014 = [ ];
//        $y2015 = [ ];
////        $y2016 = [ ];
////        $y2017 = [ ];
//        $dataArray = [ ];
//        $divisionNamesArray = [ ];
//
//        foreach ( $divisionNames as $division )
//            array_push ( $divisionNamesArray, $division->division );
//
//
//        foreach ( $y2003Details as $det )
//            array_push ( $y2003, ( float ) $det->TotalCost );
//        foreach ( $y2004Details as $det )
//            array_push ( $y2004, ( float ) $det->TotalCost );
//        foreach ( $y2005Details as $det )
//            array_push ( $y2005, ( float ) $det->TotalCost );
//
//        foreach ( $y2006Details as $det )
//            array_push ( $y2006, ( float ) $det->TotalCost );
//        foreach ( $y2007Details as $det )
//            array_push ( $y2007, ( float ) $det->TotalCost );
//        foreach ( $y2008Details as $det )
//            array_push ( $y2008, ( float ) $det->TotalCost );
//        foreach ( $y2009Details as $det )
//            array_push ( $y2009, ( float ) $det->TotalCost );
//        foreach ( $y2010Details as $det )
//            array_push ( $y2010, ( float ) $det->TotalCost );
//        foreach ( $y2011Details as $det )
//            array_push ( $y2011, ( float ) $det->TotalCost );
//        foreach ( $y2012Details as $det )
//            array_push ( $y2012, ( float ) $det->TotalCost );
//        foreach ( $y2013Details as $det )
//            array_push ( $y2013, ( float ) $det->TotalCost );
//        foreach ( $y2014Details as $det )
//            array_push ( $y2014, ( float ) $det->TotalCost );
//        foreach ( $y2015Details as $det )
//            array_push ( $y2015, ( float ) $det->TotalCost );
//
//
////        foreach ( $y2016Details as $det )
////            array_push ( $y2016, ( float ) $det->TotalCost );
////        foreach ( $y2017Details as $det )
////            array_push ( $y2017, ( float ) $det->TotalCost );
//
//
//        array_push ( $dataArray, $y2003, $y2004, $y2005,
//            $y2006, $y2007, $y2008,
//            $y2009, $y2010, $y2011, $y2012, $y2013,
//            $y2014, $y2015 );
//
////        dd($divisionNamesArray);
//
//        for($i = 0; $i < 6; $i ++)
//            $chartArray ["series"] [] = array (
//                "name" => $divisionNamesArray [$i],
//                "data" => $dataArray [$i]
//
//            );
//
//
//
//        $chartArray ["xAxis"] = array (
//            "categories" => $categoryArray
//        );
//        $chartArray ["yAxis"] = array (
//            "title" => array (
//                "text" => "Sales ( $ )"
//            )
//        );
//
//
   return view ( 'reports/report-by-plant/index' );
   }







}
