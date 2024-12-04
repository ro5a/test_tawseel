<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function getData()
    {

        $users = UserResource::collection(User::orderBy('id', 'DESC')->get());

        return response()->json([
            'users' => $users,
        ]);
    }


}
