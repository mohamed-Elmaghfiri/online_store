<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];

        // $productsInSession = $request->session()->get("products");
        $productsInCookie = json_decode($request->cookie("products"), true) ?? [];

  

        if ($productsInCookie) {
            $productsInCart = Product::findMany(array_keys($productsInCookie));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInCookie);
        }

        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] =  "Shopping Cart";
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;
        return view('cart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        // $products = $request->session()->get("products");
        $products = json_decode($request->cookie("products"), true) ?? [];
        $products[$id] = $request->input('quantity');
        // $request->session()->put('products', $products);
        cookie()->queue(cookie("products", json_encode($products), 60 * 24 * 7));

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        // $request->session()->forget('products');
        cookie()->queue(cookie("products", "", -1));
        return back();
    }

    public function purchase(Request $request)
    {
        $productsInCookie = json_decode($request->cookie("products"), true) ?? [];
    
        if ($productsInCookie) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
    
            // التحقق من نوع الدفع
            $method = $request->input('method'); // 'cash' أو 'online'
            if ($method === 'Cash on Delivery') {
                // فقط عند الدفع عند الاستلام
                $order->name = $request->input('name');
                $order->phone = $request->input('phone');
                $order->address = $request->input('address');
              
            }
    
            $order->setTotal(0);
            $order->save();
    
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInCookie));
    
            foreach ($productsInCart as $product) {
                $quantity = $productsInCookie[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
    
                // تقليل الكمية المتاحة في المخزون
                $product->quantity_store -= $quantity;
                $product->save();
    
                $total += $product->getPrice() * $quantity;
            }
    
            $order->setTotal($total);
            $order->payment_method = $request->input('method');
            $order->save();
    
            // خصم الرصيد إن لزم
            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();
    
            // تنظيف الكوكيز
            cookie()->queue(cookie("products", "", -1));
    
            $viewData = [];
            $viewData["title"] = "Purchase - Online Store";
            $viewData["subtitle"] = "Purchase Status";
            $viewData["order"] = $order;
    
            return view('cart.purchase')->with("viewData", $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
