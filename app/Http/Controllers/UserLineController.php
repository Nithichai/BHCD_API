<?php

namespace App\Http\Controllers;

use App\UserLine;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class UserLineController extends Controller
{
    public function createNewUserLine(Request $request) {
        $userLineObj = new UserLine;
        $userLine = $userLineObj->firstOrNew([
            'id' => $request->input("data.id"),
            'esp' => $request->input("data.esp")
        ]);
        if (!$userLine) {
            $userLine->id = $request->input('data.id');
            $userLine->esp = $request->input('data.esp');
            $userLine->save();
            return response()->json([
                'message' => 'User Line create completed',
                'data' => $userLine->toArray()
            ], 201);
        } else {
            return response()->json([
                'message' => 'User Line create not completed'
            ], 400);
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
