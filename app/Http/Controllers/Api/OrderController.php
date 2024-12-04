<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function change_status($id)
    {
        // try {
            $order = Order::where('id', $id)->first();
            if ($order->status == null) {
                $order->status = 'قيد التحضير';
                $order->save();
            if ($order->status == 'قيد التحضير') {
                $order->status = 'في الطريق إليك';
                $order->save();
            } elseif ($order->status == 'في الطريق إليك') {
                $order->status = 'تم التسليم';

            }
            if ($order->save()) {
                $response = [
                    'success' => true,
                    'message' => 'تم تغيير حالة الطلب',
                ];

                return response()->json($response, 200);
            }
        // } catch (\Exception $e) {
        //     return $response = [
        //         'success' => false,
        //         'message' => 'لا تستطيع تغيير الحالة',
        //     ];
        // }
    }
}
