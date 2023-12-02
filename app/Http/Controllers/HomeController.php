<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::all();

        // $product = product::paginate(6);
        // $comment = Comment::orderby('id', 'desc')->get();
        // $reply = Reply::all();
        return view('home.userpage', compact('product'));//, 'comment', 'reply'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        // dd($usertype);
        if($usertype == '1'){
            return view('admin.home');
        }else{
            return view('home.userpage');
        }
        // $total_products = Product::all()->count();
        // $total_orders = Order::all()->count();
        // $total_customers = User::all()->count();
        // $total_revenue = Order::all('price');
        // $total_customers = User::all()->count();
        // $order = Order::all();
        // $total_revenue = 0;

    }

    public function show_particular_item($id)
    {
        // dd($id);
        $product = Product::find($id);
        $productId = $product->id;
        $image = $product->image;
        // dd($image);
        return view('home.show_particular_item', compact('product','image'));
    }
}
