<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    public function kirimData(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'distance'     => 'required',
            ],
            [
                'distance.required' => 'Nilai sensor wajib disi !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = Sensor::create([
                'distance'     => $request->input('distance'),
                'status'   => $request->input('status'),
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal Disimpan!',
                ], 401);
            }
        }
    }

    public function getSingleSensor()
    {
        $sensor = Sensor::latest()->first();

        return $sensor;
    }
}
