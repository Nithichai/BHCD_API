<?php

namespace App\Http\Controllers;

use App\HealthInfoOxi;
use Illuminate\Http\Request;

class HealthInfoOxiController extends Controller
{
    public function createNewHealthInfoOxi(Request $request) {
        try {
            $healthInfoObj = new HealthInfoOxi;
            $healthInfoObj->esp = $request->input("data.esp");
            $healthInfoObj->spo2 = $request->input("data.spo2");
            $healthInfoObj->save();
            return response()->json([
                'message' => 'Health info (oxi) create completed',
                'data' => [
                    'esp' => $request->input("data.esp"),
                    'spo2' => $request->input("data.spo2")
                ]
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Health info (oxi) create not completed'
            ], 400);
        }
    }

    public function checkHealthInfoOxiByESP(Request $request) {
        $oxiObj = new HealthInfoOxi;
        $oxi = $oxiObj
            ->where('esp', $request->input('data.esp'))
            ->latest()
            ->limit(20)
            ->get();
        if ($oxi) {
            return response()->json([
                'message' => 'Found data',
                'data' => $oxi->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found data'
            ], 404);
        }
    }
}
