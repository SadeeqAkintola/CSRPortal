<?php

namespace App\Http\Controllers;

use App\Initiative;
use Illuminate\Http\Request;

class InitiativeController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}

    public function index()
{
    $initiatives = Initiative::paginate(20);

    return view('project/index', ['initiatives' => $initiatives]);
}

}