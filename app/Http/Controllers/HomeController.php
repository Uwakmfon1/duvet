<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

use Stripe;
use Illuminate\Support\Facades\Session;


use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('home.userpage', compact('product')); //, 'comment', 'reply'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $product = Product::all();
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('home.userpage', compact('product'));
        }
    }

    public function view_products()
    {
        $product = Product::all();
        return view('home.all_products', compact('product'));
    }

    public function show_particular_item($id)
    {
        $product = Product::find($id);
        $productName = $product->name;
        $productId = $product->id;
        $image = $product->image;
        return view('home.show_particular_item', compact('product', 'image', 'productName'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $product = Product::find($id);

            $product_exist_id = Cart::where('product_id', '=', $id)
                ->where('user_id', '=', $user_id)->get('id')->first();

            if ($product_exist_id != null) {
                $cart = Cart::find($product_exist_id)->first();
                // dd($cart);
                $quantity  = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                // dd($quantity);
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();

                Alert::success("Product Added Successfully!", 'You have added product to the cart');

                return redirect()->back();
            } else {
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                $cart->product_title = $product->title;

                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }

                $cart->image = $product->image;
                $cart->product_id = $product->id;

                $cart->quantity = $request->quantity;
                $cart->save();

                Alert::success("Product Added Successfully!", 'You have added product to the cart');

                return redirect()->back(); //->with('message','Product added successfully');
            }
        } else {
            return redirect('login');
        }
    }


    public function view_cart()
    {
        // dd(Cart::all());
        if (Auth::id()) {
            $user = Auth::user();
            $cart = Cart::all();
            return view('home.show_cart', [
                'cart' => $cart,
            ]);
        } else {
            return redirect('login');

        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function stripe($totalPrice)
    {
        if(Auth::id()){
            $user = Auth::user();
            return view('home.stripe', compact('totalPrice','user'));
        }else{
            return redirect('/login');
        }
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userId = $user->id;
        $orders = Cart::where('user_id', '=', $userId)->get();

    }



    public function stripePost(Request $request, $totalPrice)
    {
        // dd($totalPrice);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $totalPrice * 100, // 1cent = 0.0089 naira and 112.12 CENT = 1 naira and 1 dollar = 100cents
            "currency" => "NGN",
            "source" => $request->stripeToken,
            "description" => "Thanks For Payment"
        ]);

        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();

        foreach ($data as $data) {
            $order = new order;
            $order->name = $data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;

            $order->price = $data->price;

            $order->quantity = $data->quantity;

            $order->image = $data->image;

            $order->product_id = $data->product_id;

            $order->payment_status = 'paid';

            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }

}
