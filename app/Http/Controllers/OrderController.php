<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Services\StallionExpressService;


class OrderController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders', 'count'));
    }

    public function show(Order $order, StallionExpressService $stallionExpressService)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        $user = Auth::user();
        if ($order->user_id !== $user->id) {
            abort(403, 'Unauthorized');
        }
        $deliveryStatus=Null;
        if (is_array($order->tracking_info) && !is_null($order->tracking_info['tracking_number'])) {
            $response= $stallionExpressService->trackShipment($order->tracking_info['tracking_number']);
    $deliveryStatus = $response['status'];
    return view('orders.show', compact('order', 'count', 'deliveryStatus'));
}
        return view('orders.show', compact('order', 'count'));
    }
}
