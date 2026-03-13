<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
        return view('frontend.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'address' => 'required',
            'phone'   => 'required',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate grand total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Save order in database
        $order = Order::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
            'items'   => json_encode($cart), // Save cart items as JSON
            'total'   => $total,
            'status'  => 'Pending',
        ]);

        // Clear cart
        session()->forget('cart');

        return redirect()->route('checkout.thankyou');
    }

    public function thankYou()
    {
        return view('frontend.thankyou');
    }

}
