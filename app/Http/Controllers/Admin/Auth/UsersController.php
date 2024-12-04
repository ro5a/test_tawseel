<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMESSAGE;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function get()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $user = User::where('id', Auth::user()->id)->first();

        $user = isset($_GET['Id']) ? $user = User::where('id', $_GET['Id'])->first() : 'all';
        $users = User::get()->toJson();

        return view('admin.user', [
            'data' => $users,
            'user' => $user,
            'do' => $do,

        ]);
    }

    public function add(UsersRequest $request)
    {
        $request->validated();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => isset($request->password) ? Hash::make($request->password) : '',
                'remember_token' => Str::uuid(),
            ]);

            return to_route('users')->with([
                'success'   => CRUDMESSAGE::MESSAGE_ADD_SUCCESS,
            ]);
        } catch (\Exception) {
            return to_route('users')->with([
                'error' => CRUDMESSAGE::MESSAGE_ADD_ERROR,
            ]);
        }
    }

    public function update(UsersRequest $request, $id)
    {
        $request->validated();

        try {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => isset($request->password) ? Hash::make($request->password) : '',
                'remember_token' => Str::uuid(),
            ]);

            return to_route('users')->with([
                'success' => CRUDMESSAGE::MESSAGE_UPDATE_SUCCESS,
            ]);
        } catch (\Exception) {
            return to_route('users')->with([
                'error' => CRUDMESSAGE::MESSAGE_UPDATE_ERROR,
            ]);
        }
    }


    public function delete($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->delete();
            return back()->with([
                'success' => CRUDMESSAGE::MESSAGE_DELETE_SUCCESS,
            ]);
        } catch (\Exception) {
            return back()->with([
                'error' => CRUDMESSAGE::MESSAGE_DELETE_ERROR,
            ]);
        }
    }
}
