<?php

namespace App\Http\Controllers;

use App\DeviceInfo;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class DeviceInfoController extends Controller
{
    public function createNewDeviceInfoOnlyID(Request $request) {
        try {
            $deviceInfo = new DeviceInfo;
            $deviceInfo->device_id = $request->input("data.deviceid");
            $deviceInfo->save();
            return response()->json([
                'message' => 'Device infomation create completed',
                'data' => [
                    'device_id' => $request->input("data.deviceid"),
                ]
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Device infomation not create completed'
            ], 400);
        }
    }
}
