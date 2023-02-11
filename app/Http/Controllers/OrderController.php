<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //list page
    public function listPage()
    {
        $order = Order::select('orders.*', 'users.name as user_name')->leftJoin('users', 'users.id', 'orders.user_id')->orderBy('orders.id', 'desc')->paginate(6);
        return view('admin.order.listPage', compact('order'));
    }

    // sorting status
    public function sortingStatus(Request $request)
    {
        $order = Order::select('orders.*', 'users.name as user_name')->leftJoin('users', 'users.id', 'orders.user_id');

        if ($request->orderStatus == null) {
            $order = $order->orderBy('orders.id', 'desc')->paginate(6);
        } else {
            $order = $order->where('orders.status', $request->orderStatus)->orderBy('orders.id', 'desc')->paginate(6);
        }
        return view('admin.order.listPage', compact('order'));
    }

    // ajax change status
    public function ajaxChangeStatus(Request $request)
    {
        Order::where('id', $request->orderId)->update([
            'status' => $request->status,
        ]);

        $success = ['status' => 'success'];
        return response()->json([$success, 200]);
    }

    // order detail
    public function detail($orderCode)
    {
        $order = Order::where('order_code', $orderCode)->first();
        $orderList = OrderList::select('order_lists.*', 'users.name as user_name', 'products.image as      product_image', 'products.name as product_name')
            ->leftJoin('users', 'users.id', 'order_lists.user_id')
            ->leftJoin('products', 'products.id', 'order_lists.product_id')
            ->where('order_code', $orderCode)
            ->get();

        return view('admin.order.detail', compact('orderList', 'order'));
    }
}
