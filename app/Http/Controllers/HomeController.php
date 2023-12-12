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
    

    public function show_particular_item($id)
    {
        $product = Product::find($id);
        $productId = $product->id;
        $image = $product->image;
        return view('home.show_particular_item', compact('product','image'));
    }
}
