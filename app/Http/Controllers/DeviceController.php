<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class DeviceController extends Controller
{
    public function createNewDevice(Request $request) {
        $deviceObj = new Device;
        $device = $deviceObj
            ->where('espname', '=', $request->input("data.espname"))
            ->where('deviceid', '=' , $request->input("data.deviceid"))
            ->get();
        if (count($device) > 0) {
            return response()->json([
                'message' => 'Device is created'
            ], 200);
        } else {
            $deviceObj = new Device;
            $deviceObj->espname = $request->input("data.espname");
            $deviceObj->deviceid = $request->input("data.deviceid");
            $deviceObj->password = Hash::make("Smarthelper");
            $deviceObj->save();
            return response()->json([
                'message' => 'Device create completed',
                'data' => $deviceObj->toArray()
            ], 201);
        }
    }

    public function checkDeviceByESPName(Request $request) {
        $deviceObj = new Device;
        $device = $deviceObj->where('espname', $request->input('data.espname'))->first();
        if ($device) {
            return response()->json([
                'message' => 'Found device',
                'data' => $device->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found device'
            ], 404);
        }
    }

    public function checkDeviceByDeviceID(Request $request) {
        $deviceObj = new Device;
        $device = $deviceObj->where('deviceid', $request->input('data.deviceid'))->first();
        if ($device) {
            return response()->json([
                'message' => 'Found device',
                'data' => $device->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found device'
            ], 404);
        }
    }

    public function updateDeviceByESPName(Request $request) {
        $deviceObj = new Device;
        $device = $deviceObj->where('espname', $request->input('data.espname'))->first();
        if ($device) {
            $device->password = Hash::make($request->input('data.password'));
            $device->save();
            return response()->json([
                'message' => 'Device update complete'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Device update not complete'
            ], 404);
        }
    }
}
