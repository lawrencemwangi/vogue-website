<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::latest()->get();

        return view('adminside.orders.list_orders', compact('orders'));
    }


    public function checkout()
    {
        $user = auth()->user(); 
        $cart = session()->get('cart', []);
        $total = session()->get('cart_total', 0);

        if (empty($cart)) {
            return redirect()->back()->with('error', [
                'message' => 'oops yours cart is empty.',
                'duration' => $this->alert_message_duration,
            ]);
        }

        return view('checkout', compact('user', 'cart', 'total'));
    }

    public function storeCheckout(Request $request)
    {
        $validated = $request->validate([
            'names' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $cart = session()->get('cart', []);
        $total = session()->get('cart_total', 0);

        if (empty($cart)) {
            return redirect()->back()->with('error', [
                'message' => 'Your cart is empty.',
                'duration' => $this->alert_message_duration,
            ]);
        }

        $order = new Order;
        $order->order_number = 'ORD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));
        $order->user_id = auth()->id(); 
        $order->names = $validated['names'];
        $order->email = $validated['email'];
        $order->phone = $validated['phone'];
        $order->address = $validated['address'];
        $order->total = $total;
        $order->cart = json_encode($cart); 
        $order->save();

        session()->forget(['cart', 'cart_total', 'cart_count']);

        return redirect()->route('shop')->with('success', [
            'message' => 'Order placed successfully!',
            'duration' => $this->alert_message_duration,
        ]);
    }

    public function create()
    {
     
    }

    public function edit(Order $order)
    {
        $orders = Order::latest()->get();
        return view('adminside.orders.update_orders', compact('orders', 'order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,complete',
            'paid' => 'required|in:0,1'
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', [
            'message' => 'Order Update successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
  

}
