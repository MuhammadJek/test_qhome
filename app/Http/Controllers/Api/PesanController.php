<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Gagal create message',
                    'status' => false,
                    'data' => $validator->errors(),
                ], 422);
            }

            $message = Pesan::create([
                'description' => $request->description,
            ]);
            DB::commit();
            return response()->json([
                'message' => 'Berhasil create message',
                'status' => true,
                'data' => $message,
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'message' => 'Gagal create message',
                'status' => true,
                'data' => $th,
            ], 500);
        }
    }
}
