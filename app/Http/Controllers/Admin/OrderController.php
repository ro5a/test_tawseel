<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Enum\CRUDMESSAGE;
use App\Http\Requests\AddOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function get()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $order = isset($_GET['Id']) ? $order = Order::where('id', $_GET['Id'])->first() : 'all';
        $products = Product::orderBy('id', 'DESC')->get();
        $users = User::orderBy('id', 'DESC')->get();

        $order = Order::with(['user' => function ($q) {
            $q->withTrashed();
        }, 'product' => function ($p) {
            $p->withTrashed();
        }])->orderBy('id', 'DESC')->get()->toJson();
        return view('admin.order', [
            'data' => $order,
            'products' => $products,
            'users' => $users,
            'do' => $do,
        ]);
    }


    public function add(AddOrderRequest $request)
    {
        $request->validated();
        try {

            $order = Order::create([
                'product_id' =>  $request->product_id,
                'user_id' =>  Auth::user()->id,
                'quantity' =>  $request->quantity,
                'status' => 'قيد التحضير'

            ]);

            return to_route('orders')->with([
                'success' => CRUDMESSAGE::MESSAGE_ADD_SUCCESS,
            ]);
        } catch (\Exception) {
            return redirect()->route('orders')->with([
                'error' => CRUDMESSAGE::MESSAGE_ADD_ERROR,
            ]);
        }
    }
}
