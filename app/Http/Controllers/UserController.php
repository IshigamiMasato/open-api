<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(int $userId)
    {
        $user = User::find($userId);

        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['code' => '0000001', 'message' => 'User not found'], 404);
        }
    }
}
