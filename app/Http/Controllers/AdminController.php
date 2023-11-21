<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
        // dd($request);
         $product = new Product();
         $product->title = $request->title;
         $product->category = $request->title;
         $product->description = $request->title;
         $product->price = $request->title;
         $product->discount_price = $request->title;

         $image = $request->image;
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->image->move('product',$imagename);
         $product->image = $imagename;

         $product->save();
        return redirect()->back();
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

    public function add_categories(Request $request)
    {
        dd($request);

        if(Auth::id()){

            $category = new Category();
            $category->category_name = $request->category_name;
            $category->category = $request->category;
            return redirect()->back();
           }else{
            return redirect('login');
           }
    }
    
    public function show_categories()
    {
        if(Auth::id()){
            $category = Category::all();
            return view('admin.showCategory', compact('category'));
           }else{
            return redirect('login');
           }
    }

}
