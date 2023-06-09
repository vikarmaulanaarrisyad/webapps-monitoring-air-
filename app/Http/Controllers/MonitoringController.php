<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        return view('admin.monitoring.index');
    }

    public function getData(Request $request)
    {
        $distance = Sensor::latest()->pluck('distance','status')->first();

        return response()->json(['data' => $distance]);
    }
}
