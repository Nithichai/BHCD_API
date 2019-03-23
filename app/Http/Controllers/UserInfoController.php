<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class UserInfoController extends Controller
{
    public function createNewUserInfo(Request $request) {
        try {
            $userInfoObj = new UserInfo;
            $userInfoObj->id = $request->input('data.id');
            // $userInfoObj->firstname = $request->input('data.firstname');
            // $userInfoObj->lastname = $request->input('data.lastname');
            // $userInfoObj->phone = $request->input('data.phone');
            $userInfoObj->email = $request->input('data.email');
            // $userInfoObj->career = $request->input('data.career');
            // $userInfoObj->birthday = $request->input('data.birthday');
            $userInfoObj->displayName = $request->input('data.displayName');
            $userInfoObj->pic = $request->input('data.pic');
            $userInfoObj->save();
            return response()->json([
                'message' => 'User information create completed',
                'data' => $userInfoObj->toArray()
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

    public function updateUserInfoByID(Request $request) {
        try {
            $userInfoObj = new UserInfo;
            $userInfo = $userInfoObj->where('id', $request->input('data.id'))->first();
            $userInfo->firstname = $request->input('data.firstname');
            $userInfo->lastname = $request->input('data.lastname');
            $userInfo->phone = $request->input('data.phone');
            $userInfo->email = $request->input('data.email');
            $userInfo->career = $request->input('data.career');
            $userInfo->birthday = $request->input('data.birthday');
            $userInfo->displayName = $request->input('data.displayName');
            $userInfo->pic = $request->input('data.pic');
            $userInfo->save();
            return response()->json([
                'message' => 'User information update completed',
                'data' => $userInfo->toArray()
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'User information update not completed'
            ], 400);
        }
    }

    public function deleteUserInfoByID(Request $request) {
        $userInfoObj = new UserInfo;
        $userInfo = $userInfoObj
            ->where('id', $request->input('data.id'))
            ->first();
        if ($userInfo) {
            $userInfo->delete();
            return response()->json([
                'message' => 'Delete user info completed'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Delete user info not completed'
            ], 404);
        }
    }
}
