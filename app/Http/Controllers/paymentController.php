<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{

    private function calculateCartTotal()
{
    $total = 0;

    // استرجاع المنتجات من الكوكيز
    $productsInCookie = json_decode(request()->cookie("products"), true) ?? [];

    if ($productsInCookie) {
        $productsInCart = \App\Models\Product::findMany(array_keys($productsInCookie));
        foreach ($productsInCart as $product) {
            $quantity = $productsInCookie[$product->id];
            $total += $product->price * $quantity;
        }
    }

    return $total;
}


    public function processPaymentMethod(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:Cash on Delivery,Online',
        ]);

        if ($request->payment_method === 'Online') {
            return view('payment.online_payment');
        } else {
            return view('payment.cash_payment_info');
        }
    }

    


public function saveCashPayment(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
    ]);

    $order = new Order();
    $order->user_id = auth()->id(); // ربط الطلب بالمستخدم
    $order->payment_method = 'Cash on Delivery';
    $order->status = 'Packed'; // الحالة الابتدائية

    $order->total = $this->calculateCartTotal(); // ضع هنا دالة لحساب السعر
    $order->save();

    // إذا كنت تريد تخزين العناصر (items) المرتبطة بالطلب:
    // foreach (cart_items() as $item) {
    //     $order->items()->create([...]);
    // }
    return redirect()->route('cart.purchase')
        ->with('success', 'Order placed successfully. Your order will be delivered soon.');
}

}