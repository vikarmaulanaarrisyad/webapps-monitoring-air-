<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $sensor = Sensor::orderBy('created_at', 'desc')->take(7)->get();

            foreach ($sensor as $item) {
                $hari[] = format_hari($item->created_at->format('l')); // 'l' menghasilkan nama hari (e.g., "Monday")
                $data[] = $item->distance;
            }

            return view('admin.dashboard.index', compact('data', 'hari'));
        }
    }
}
