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

        // Retrieve products stored in the cookie
        $productsInCookie = json_decode($request->cookie("products"), true) ?? [];

        // Fetch the products based on the IDs in the cookie
        if ($productsInCookie) {
            $productsInCart = Product::findMany(array_keys($productsInCookie));

            // Calculate total price based on quantities in the cookie
            $total = Product::sumPricesByQuantities($productsInCart, $productsInCookie);
        }

        // Pass data to the view
        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;
        $viewData["productsInCookie"] = $productsInCookie;  // Pass the cookie data to the view

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
        // $productsInSession = $request->session()->get("products");
        $productsInCookie = json_decode($request->cookie("products"), true) ?? [];

        if ($productsInCookie) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
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
                // update quantity_tore of product
                $product->quantity_store -= $quantity;
                $product->save();
                $total += $product->getPrice() * $quantity;
                $total = $total + ($product->getPrice()*$quantity);
            }
            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();



            // $request->session()->forget('products');
            cookie()->queue(cookie("products", "", -1));

            $viewData = [];
            $viewData["title"] = "Purchase - Online Store";
            $viewData["subtitle"] =  "Purchase Status";
            $viewData["order"] =  $order;
            return view('cart.purchase')->with("viewData", $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
