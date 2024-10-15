<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function name(Request $request)
    {
        $name = $request->query('name', 'Asep');

        return response()->json([
            'message' => 'Hello ' . $name . ' welcome my api',
        ], 200);
    }
}
