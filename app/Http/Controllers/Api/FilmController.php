<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{

    public function index()
    {
        try {
            DB::beginTransaction();
            $data = Film::all();
            DB::commit();
            if ($data) {
                return response()->json([
                    'message' => "Get Data Success",
                    'status' => true,
                    'data' => $data,
                ], 200);
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'message' => "Fails Get Data",
                'status' => false,
            ], 400);
        }
    }
    public function getFilm($genre)
    {
        try {
            DB::beginTransaction();
            $data = Film::where('genre', '=', $genre)->get();
            DB::commit();
            if ($data->isEmpty()) {

                return response()->json([
                    'message' => "Fails Find Data",
                    'status' => true,
                ], 404);
            } else {
                return response()->json([
                    'message' => "Find Data Success",
                    'status' => true,
                    'data' => $data,
                ], 200);
            }

            //code...
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json([
                'message' => "Not Find Data Success",
                'status' => false,
            ], 400);
        }
    }
}
