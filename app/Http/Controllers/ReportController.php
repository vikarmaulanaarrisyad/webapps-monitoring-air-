<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $start = now()->subDays(30)->format('Y-m-d');
        $end = date('Y-m-d');

        if ($request->has('start') && $request->start != "" && $request->has('end') && $request->end != "") {
            $start = $request->start;
            $end = $request->end;
        }

        return view('report.index', compact('start', 'end'));
    }

    public function getData($start, $end)
    {
        $data = [];
        $i = 1;

        $sensors = Sensor::whereBetween('created_at', [$start, $end])->get();
        // $sensors = Sensor::whereDate('created_at', [$start, $end])->get();

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
                $row['DT_RowIndex'] = $i++;
                $row['tanggal'] = tanggal_indonesia($sensor->created_at, strtotime($sensor->created_at)) . ' ' . date('H:I:s', strtotime($sensor->created_at));
                $row['ketinggian'] = $sensor->distance . ' cm';
                $row['status'] = '<span class=" badge badge-' . $sensor->statusColor() . ' ">' . $sensor->status . '</span >';

                $data[] = $row;
            }
        }

        return $data;
    }


    public function data($start, $end)
    {
        $data = $this->getData($start, $end);

        return datatables($data)
            ->escapeColumns([])
            ->make(true);
    }

    public function exportPDF($start, $end)
    {
        $data = $this->getData($start, $end);
        $pdf = PDF::loadView('report.pdf', compact('start', 'end', 'data'));

        return $pdf->stream('Laporan-penggalangan-dana-' . date('Y-m-d-his') . '.pdf');
    }
}
