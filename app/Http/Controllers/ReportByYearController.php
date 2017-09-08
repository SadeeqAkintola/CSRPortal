<?php

namespace App\Http\Controllers;

use App\Division;
use App\ProjectDetails;
use App\ReportByPlant;
use Illuminate\Http\Request;

class ReportByYearController extends Controller
{
    public function highchart() {

   return view ( 'reports/report-by-year/index' );
   }







}
