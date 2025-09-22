<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::all();
        return view('admin.orders.index', ['data' => $data]);
    }

    public function destroy(Order $order)
    {
        OrderItem::where('order_id', $order->id)->delete();
        $order->delete();

        return redirect()->route('orders.index')->with('success', __('app.order_deleted_successfully'));
    }
    public function show(Order $order)
    {

        return view('admin.orders.show', ['order' => $order]);
    }
}
