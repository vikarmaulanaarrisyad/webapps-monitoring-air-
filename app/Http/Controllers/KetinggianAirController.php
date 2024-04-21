<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KetinggianAirController extends Controller
{
    public function perhariIndex()
    {
        $day = Carbon::now()->format('Y-m-d');

        return view('admin.ketinggianair.perhari.index', compact('day'));
    }

    public function getDataPerhari($day)
    {
        $data = [];

        $sensors = Sensor::orderBy('created_at', 'desc')->whereDate('created_at', $day)->get();

        if ($sensors->isEmpty()) {
            $data[] = [
                'DT_RowIndex' => '',
                'tanggal' => '',
                'ketinggian' => '',
                'status' => '',
            ];
        } else {
            foreach ($sensors as $sensor) {
                $row = [];
                $row['DT_RowIndex'] = $sensor->id;
                $row['tanggal'] = $sensor->created_at->format('H:i:s');
                $row['ketinggian'] = $sensor->distance . ' cm';
                $row['status'] = '<span class=" badge badge-' . $sensor->statusColor() . ' ">' . $sensor->status . '</span >';
            }
        }

        return $data;
    }

    public function perhariData($day)
    {

        $data = $this->getDataPerhari($day);

        return datatables($data)
            ->escapeColumns([])
            ->make(true);
    }

    // PERBULAN
    public function perbulanIndex()
    {
        $month = Carbon::now()->format('Y-m-d');

        return view('admin.ketinggianair.perbulan.index', compact('month'));
    }

    public function perbulanData(Request $request)
    {
        $query = Sensor::when($request->filled('bulan') && $request->filled('tahun'), function ($query) use ($request) {
            $query->whereYear('created_at', $request->tahun)
                ->whereMonth('created_at', $request->bulan);
        })->orderBy('id', 'desc');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('tanggal', function ($query) {
                return tanggal_indonesia($query->created_at, false, true);
            })
            ->editColumn('ketinggian', function ($query) {
                return $query->distance . ' cm';
            })
            ->escapeColumns([])
            ->make(true);
    }
}
