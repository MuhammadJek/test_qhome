<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function now()
    {
        return response()->json(
            ['status' => 'success', 'datetime' => Carbon::parse(now())->format('D, d M Y H:i:s')]
        );
    }
}
