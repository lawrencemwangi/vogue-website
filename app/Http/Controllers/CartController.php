<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function showCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach($cart as $item){
            $total += $item['quantity'] * $item['price'];
        }

        return view('cart_show', compact('cart'),[
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function AddToCart(Request $request, $id)
    {
        $Item = Shop::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // If not, add to cart
            $cart[$id] = [
                'item_name' => $Item->item_name,
                'price' => $Item->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart',$cart);
        session()->put('cart_count', array_sum(array_column($cart, 'quantity')));

        return back()->with('sucess', [
            'message' => 'Product added to cart',
            'duration' => $this->alert_message_duration,
        ]);
    }

    public function destroy ($id)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
    
            // Recalculate total and count
            $total = 0;
            $count = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
                $count += $item['quantity'];
            }
            session()->put('cart_total', $total);
            session()->put('cart_count', $count);
        }
    
        return redirect()->back()->with('success', [
            'message' => 'Cart Item delete successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
    

    public function update($id, $action)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($action == 'increase') {
                $cart[$id]['quantity'] += 1;
            } elseif ($action == 'decrease') {
                $cart[$id]['quantity'] -= 1;
                if ($cart[$id]['quantity'] < 1) {
                    unset($cart[$id]);
                }
            }
        }

        // Update the session
        session()->put('cart', $cart);

        // Recalculate total and count
        $total = 0;
        $count = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
            $count += $item['quantity'];
        }

        session()->put('cart_total', $total);
        session()->put('cart_count', $count);

        return redirect()->back()->with('success',[
            'message' => 'Cart Item updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

}
