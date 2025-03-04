<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //allOrder
    public function allOrder()
    {
        $items = Order::latest()->get();
        return view('admin.pages.order.all_order',compact('items'));
    }

    //orderDetails
    public function orderDetails($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id',$order->id)->get();

        return view('admin.pages.order.order_details',compact('order','orderItems'));
    }
}
