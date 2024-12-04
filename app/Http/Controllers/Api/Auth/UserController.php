<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function getData()
    {

        $users = User::get();

        return response()->json([
            'users' => $users,
        ]);
    }


}
