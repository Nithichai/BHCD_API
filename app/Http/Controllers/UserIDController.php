<?php

namespace App\Http\Controllers;

use App\UserLine;
use Illuminate\Http\Request;

class UserIDController extends Controller
{
    public function newUser(Request $request) {
        $userLine = new UserLine;
        $userLine->id = $request->id;
        $userLine->esp = $request->esp;
        $userLine->save();
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ], 201);
    }
}
