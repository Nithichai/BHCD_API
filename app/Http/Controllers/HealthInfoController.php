<?php

namespace App\Http\Controllers;

use App\HealthInfo;
use Illuminate\Http\Request;

class HealthInfoController extends Controller
{
    public function createNewHealthInfo(Request $request) {
        try {
            $healthInfoObj = new HealthInfo;
            $healthInfoObj->esp = $request->input("data.esp");
            $healthInfoObj->hbp = $request->input("data.hbp");
            $healthInfoObj->lbp = $request->input("data.lbp");
            $healthInfoObj->hr = $request->input("data.hr");
            $healthInfoObj->save();
            return response()->json([
                'message' => 'Health info create completed',
                'data' => [
                    'esp' => $request->input("data.esp"),
                    'hbp' => $request->input("data.hbp"),
                    'lbp' => $request->input("data.lbp"),
                    'hr' => $request->input("data.hr")
                ]
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Health info create not completed'
            ], 400);
        }
    }

    public function checkHealthInfoByESP(Request $request) {
        $hbpObj = new HealthInfo;
        $hbp = $hbpObj
            ->where('esp', $request->input('data.esp'))
            ->latest()
            ->limit(10)
            ->get();
        if ($hbp) {
            return response()->json([
                'message' => 'Found data',
                'data' => $hbp->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found data'
            ], 404);
        }
    }
}
