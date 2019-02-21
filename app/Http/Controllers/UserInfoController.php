<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class UserInfoController extends Controller
{
    public function checkUserInfoByID(Request $request) {
        $userInfoObj = new UserInfo;
        $userInfo = $userInfoObj->where('id', $request->input('data.id'))->first();
        if ($userInfo) {
            return response()->json([
                'message' => 'Found user infomation',
                'data' => $userInfo->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found user infomation'
            ], 404);
        }
    }
}
