<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductImage;
class ProductController extends Controller
{

    // ===================== PRODUCTS =====================

    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function create()
    {
        return view('add-product');
    }

    public function store(Request $request)
{
    // MAIN IMAGE
    $mainImage = null;

    if($request->hasFile('images')) {

        $mainImage = $request->file('images')[0]
                             ->store('products', 'public');
    }

    // CREATE PRODUCT
    $product = Product::create([

        'category' => $request->category,
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $mainImage,

        'ram' => $request->ram,
        'storage' => $request->storage,
        'processor' => $request->processor,

        'size' => $request->size,
        'color' => $request->color,
        'material' => $request->material,

        'tone' => $request->tone,
        'weight' => $request->weight,
        'skin_type' => $request->skin_type,

        'shoe_size' => $request->shoe_size,
    ]);

    // SAVE ALL IMAGES
    if($request->hasFile('images')) {

        foreach($request->file('images') as $img) {

            $path = $img->store('products', 'public');

            ProductImage::create([

                'product_id' => $product->id,
                'image' => $path

            ]);
        }
    }

    return redirect('/products');
}

    // ===================== PRODUCT DETAIL =====================

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product-detail', compact('product'));
    }

    // ===================== CART =====================

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            $cart[$id]['qty']++;

        } else {

            $cart[$id] = [

                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "qty" => 1

            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    public function increaseQty($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            $cart[$id]['qty']++;
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function decreaseQty($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            $cart[$id]['qty']--;

            if($cart[$id]['qty'] <= 0) {

                unset($cart[$id]);
            }
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {

            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    // ===================== CHECKOUT PAGE =====================

    public function checkoutPage()
    {
        $cart = session()->get('cart', []);

        if(empty($cart)) {

            return redirect('/cart');
        }

        return view('checkout', compact('cart'));
    }

    // ===================== PAYMENT =====================

    public function processPayment()
    {
        $cart = session()->get('cart', []);

        if(empty($cart)) {

            return redirect('/cart');
        }

        $total = 0;

        foreach($cart as $item) {

            $total += $item['price'] * $item['qty'];
        }

        // CREATE ORDER
        $order = Order::create([

            'total' => $total,
            'status' => 'paid'

        ]);

        // CREATE ORDER ITEMS
        foreach($cart as $id => $item) {

           OrderItem::create([

    'order_id' => $order->id,
    'product_name' => $item['name'],
    'price' => $item['price'],
    'qty' => $item['qty']

]);
        }

        // CLEAR CART
        session()->forget('cart');

        return redirect('/orders/' . $order->id);
    }

    // ===================== ORDERS =====================

    public function orders()
    {
        $orders = Order::latest()->get();

        return view('orders', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = Order::findOrFail($id);

        $items = OrderItem::where('order_id', $id)->get();

        return view('order-details', compact('order', 'items'));
    }

    public function markAsPaid($id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'paid';

        $order->save();

        return redirect()->back();
    }

    // ===================== ADDRESS =====================

    public function addressPage()
    {
        return view('address');
    }

    public function saveAddress(Request $request)
    {
        session([

            'address' => [

                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'city' => $request->city,
                'address' => $request->address,

            ]

        ]);

        return redirect('/checkout');
    }

    // ===================== SEARCH =====================

    public function search(Request $request)
    {
        $query = $request->query;

        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();

        return view('products', compact('products'));
    }

}