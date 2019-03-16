<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceInfo;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class DeviceInfoController extends Controller
{
    public function createNewDeviceInfoOnlyID(Request $request) {
        $deviceObj = new Device;
        $device = $deviceObj
            ->where('deviceid', $request->input('data.deviceid'))
            ->get();
        if (count($device) > 0) {
            if (Hash::check($request->input("data.password"), $device[0]->password)) {
                $deviceInfoObj = new DeviceInfo;
                $deviceInfo = $deviceInfoObj
                    ->where('deviceid', '=' , $request->input("data.deviceid"))
                    ->get();
                if (count($deviceInfo) > 0) {
                    return response()->json([
                        'message' => 'Device information is created'
                    ], 200);
                } else {
                    $deviceInfoObj = new DeviceInfo;
                    $deviceInfoObj->deviceid = $request->input("data.deviceid");
                    $deviceInfoObj->save();
                    return response()->json([
                        'message' => 'Device information create completed',
                        'data' => $deviceInfoObj->toArray()
                    ], 201);
                }
            } else {
                return response()->json([
                    'message' => 'Password is not correct'
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'Device not found'
            ], 404);
        }
    }

    public function checkDeviceInfoByDeviceID(Request $request) {
        $deviceInfoObj = new DeviceInfo;
        $deviceInfo = $deviceInfoObj->where('deviceid', $request->input('data.deviceid'))->first();
        if ($deviceInfo) {
            return response()->json([
                'message' => 'Found device information',
                'data' => $deviceInfo->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found device information'
            ], 404);
        }
    }

    public function updateDeviceInfoByDeviceID(Request $request) {
        try {
            $deviceInfoObj = new DeviceInfo;
            $deviceInfo = $deviceInfoObj->where('deviceid', $request->input('data.deviceid'))->first();
            $deviceInfo->name = $request->input('data.name');
            $deviceInfo->sex = $request->input('data.sex');
            $deviceInfo->height = $request->input('data.height');
            $deviceInfo->weight = $request->input('data.weight');
            $deviceInfo->disease = $request->input('data.disease');
            $deviceInfo->phone = $request->input('data.phone');
            $deviceInfo->birthday = $request->input('data.birthday');
            $deviceInfo->address = $request->input('data.address');
            $deviceInfo->save();
            return response()->json([
                'message' => 'Device infomation update completed',
                'data' => $deviceInfo->toArray()
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Device infomation not update completed'
            ], 400);
        }
    }

    public function deleteDeviceInfoByDeviceID(Request $request) {
        $deviceInfoObj = new DeviceInfo;
        $deviceInfo = $deviceInfoObj->where('deviceid', $request->input('data.deviceid'))->first();
        if ($deviceInfo) {
            $deviceInfo->delete();
            return response()->json([
                'message' => 'Delete device info completed'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Delete device info not completed'
            ], 404);
        }
    }
}
