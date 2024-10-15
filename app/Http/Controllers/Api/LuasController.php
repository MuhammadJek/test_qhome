<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LuasController extends Controller
{
    public function luas(Request $request)
    {
        try {
            //code...
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'panjang' => 'required|numeric|between:0,99999.9999999',
                'lebar' => 'required|numeric|between:0,99999.9999999',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Fails conversition wide',
                    'status' => false,
                    'data' => $validator->errors(),
                ], 422);
            }
            $count = $request->panjang * $request->lebar;
            DB::commit();
            return response()->json([
                'message' => 'Success conversition wide',
                'status' => true,
                'data' => 'Luas = ' . $count
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error system conversition wide',
                'status' => false,
                'data' => $th
            ], 500);
            // throw $th;
        }
    }
}
