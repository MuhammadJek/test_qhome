<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function now()
    {
        try {
            //code...
            return response()->json(
                ['message' => 'Berhasil', 'status' => true, 'datetime' => Carbon::parse(now())->format('D, d M Y H:i:s')]
            );
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(
                ['message' => 'Gagal', 'status' => true]
            );
        }
    }
}
