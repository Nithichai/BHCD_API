<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class UserInfoController extends Controller
{
    public function createNewUserInfo(Request $request) {
        try {
            $userInfo = new UserInfo;
            $userInfo->id = $request->input('data.id');
            $userInfo->firstname = $request->input('data.firstname');
            $userInfo->lastname = $request->input('data.lastname');
            $userInfo->phone = $request->input('data.phone');
            $userInfo->email = $request->input('data.email');
            $userInfo->career = $request->input('data.career');
            $userInfo->birthday = $request->input('data.birthday');
            $userInfo->save();
            return response()->json([
                'message' => 'User information create completed',
                'data' => $request->input('data')
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'User information create not completed'
            ], 400);
        }
    }

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
