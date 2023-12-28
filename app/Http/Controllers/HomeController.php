<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('home.userpage', compact('product'));//, 'comment', 'reply'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $product = Product::all();
        if($usertype == '1'){
            return view('admin.home');
        }else{
            return view('home.userpage',compact('product'));
        }
    }

    public function view_products(){
        $product= Product::all();
        return view('home.all_products',compact('product'));
    }

    public function show_particular_item($id)
    {
        $product = Product::find($id);
        $productName = $product->name;
        $productId = $product->id;
        $image = $product->image;
        return view('home.show_particular_item', compact('product','image','productName'));
    }

    public function add_cart(Request $request,$id)
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

                Alert::success("Product Added Successfully!",'You have added product to the cart');

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

                Alert::success("Product Added Successfully!",'You have added product to the cart');

                return redirect()->back();//->with('message','Product added successfully');
            }


        } else {
            return redirect('login');
        }
}


    public function view_cart()
    {
        $cart = Cart::all();
       return view('home.show_cart',[
        'cart'=>$cart,
       ]);
    }

    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
