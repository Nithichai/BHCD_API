<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserLineAndDeviceInfoController extends Controller
{
    public function checkUserLineAndDeviceInfoByESP(Request $request) {
        $table = DB::table('userline')
                    ->join('device_infomation', 'userline.esp', '=',  'device_infomation.deviceid')
                    ->select('userline.id', 
                                'userline.esp', 
                                'device_infomation.name',
                                'device_infomation.sex',
                                'device_infomation.height',
                                'device_infomation.weight',
                                'device_infomation.disease',
                                'device_infomation.phone',
                                'device_infomation.birthday',
                                'device_infomation.address')
                    ->where('userline.esp', '=', $request->input("data.esp"))
                    ->get();
        if (count($table) > 0) {
            return response()->json([
                'message' => 'Found user line and device id',
                'data' => $table
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found user line and device id'
            ], 404);
        }       
    }

    public function listDeviceInfoByID(Request $request) {
        $table = DB::table('userline')
            ->join('device_infomation', 'userline.esp', '=',  'device_infomation.deviceid')
            ->select('deviceid as หมายเลข', 'name as ผู้ใช้งาน', 'deviceid as แก้ไข')
            ->where('userline.id',  $request->input("data.id"))
            ->get();
        if (count($table)) {
            return response()->json([
                'message' => 'List device information',
                'data' => $table
            ], 200);
        } else {
            return response()->json([
                'message' => 'Cannnot list device information'
            ], 404);
        }
    }
}
