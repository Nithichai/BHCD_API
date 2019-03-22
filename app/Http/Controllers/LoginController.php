<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function createNewLogin(Request $request) {
        $loginObj = new Login;
        $login = $loginObj
            ->where('line_id', $request->input('data.line_id'))
            ->get();
        if (count($login) > 0) {
            return response()->json([
                'message' => 'Line login is created'
            ], 200);
        } else {
            $loginObj = new Login;
            $loginObj->line_id = $request->input('data.line_id');
            $loginObj->bot_id = $request->input('data.bot_id');
            $loginObj->name = $request->input('data.name');
            $loginObj->email = $request->input('data.email');
            $loginObj->pic_url = $request->input('data.pic_url');
            $loginObj->save();
            return response()->json([
                'message' => 'Line login create completed',
                'data' => $loginObj->toArray()
            ], 201);
        }
    }

    public function checkLoginByLineID(Request $request) {
        $loginObj = new Login;
        $login = $loginObj->where('line_id', $request->input("data.line_id"))->get();
        if (count($login) > 0) {
            $login = $login->first();
            return response()->json([
                'message' => 'Found line login',
                'data' => $login->toArray()
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found line login'
            ], 404);
        }
    }

    public function deleteLoginByLineID(Request $request) {
        $loginObj = new Login;
        $login = $loginObj
            ->where('line_id', $request->input('data.line_id'))
            ->get();
        if (count($login) > 0) {
            $login = $login->first();
            $login->delete();
            return response()->json([
                'message' => 'Delete line login completed'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Delete line login not completed'
            ], 404);
        }
    }
}
