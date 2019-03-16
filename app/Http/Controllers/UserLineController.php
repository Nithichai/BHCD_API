<?php

namespace App\Http\Controllers;

use App\UserLine;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class UserLineController extends Controller
{
    public function createNewUserLine(Request $request) {
        $userLineObj = new UserLine;
        $userLine = $userLineObj
            ->where('id', $request->input('data.id'))
            ->where('esp', $request->input('data.esp'))
            ->get();
        if (count($userLine) > 0) {
            return response()->json([
                'message' => 'User Line is created'
            ], 200);
        } else {
            $userLineObj = new UserLine;
            $userLineObj->id = $request->input('data.id');
            $userLineObj->esp = $request->input('data.esp');
            $userLineObj->save();
            return response()->json([
                'message' => 'User Line create completed',
                'data' => $userLineObj->toArray()
            ], 201);
        }
    }

    public function checkUserLineByESP(Request $request) {
        $userLineObj = new UserLine;
        $userLine = $userLineObj->where('esp', $request->input("data.esp"))->first();
        if ($userLine) {
            return response()->json([
                'message' => 'Found user line',
                'data' => $userLine->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found user line'
            ], 404);
        }
    }
    
    public function checkUserLineByIDESP(Request $request) {
        $userLineObj = new UserLine;
        $userLine = $userLineObj
            ->where('id', $request->input("data.id"))
            ->where('esp', $request->input("data.esp"))
            ->first();
        if ($userLine) {
            return response()->json([
                'message' => 'Found user line',
                'data' => $userLine->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found user line'
            ], 404);
        }
    }

    public function deleteUserLineByIDESP(Request $request) {
        $userLineObj = new UserLine;
        $userLine = $userLineObj
            ->where('id', $request->input('data.id'))
            ->where('esp', $request->input('data.esp'))
            ->first();
        if ($userLine) {
            $userLine->delete();
            return response()->json([
                'message' => 'Delete user line completed'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Delete user line not completed'
            ], 404);
        }
    }

    public function deleteUserLineByID(Request $request) {
        $userLineObj = new UserLine;
        $userLine = $userLineObj
            ->where('id', $request->input('data.id'))
            ->get();
        if (count($userLine) > 0) {
            $userLineObj->where('id', $request->input('data.id'))->delete();
            return response()->json([
                'message' => 'Delete user line completed'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Delete user line not completed'
            ], 404);
        }
    }
}
