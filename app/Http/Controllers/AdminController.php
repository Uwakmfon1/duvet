<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        return view("admin.home");
    }

    public function view_product()
    {
        return view('admin.addProduct');
    }
    public function add_product(Request $request)
    {
        dd($request);
         $product = new Product;
         $product->title = $request->title;
         $product->category = $request->title;
         $product->description = $request->title;

         $product->price = $request->title;

         $product->image = $request->title;
         $product->discount_price = $request->title;
         $product->image = $request->title;

    }

    public function show_product()
    {
        return view('');
    }

    public function categories()
    {
        return view('');
    }

    public function orders()
    {
        return view('');
    }


}
