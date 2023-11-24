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
        $category = Category::all();
        return view('admin.addProduct',compact('category'));
    }

    public function add_product(Request $request)
    {
         $product = new Product();
         $product->title = $request->title;
         $product->category = $request->category;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->discount_price = $request->discount_price;
         $product->quantity= $request->quantity;
         $image = $request->image;
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->image->move('product',$imagename);
         $product->image = $imagename;

         $product->save();

        return redirect()->back();
    }


    public function show_product()
    {
        $product = Product::all();

        return view('admin.showProduct',compact('product'));
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
        if(Auth::id()){
            $category = new Category();
            $category->category_name = $request->category_name;
            $category->save();
            return redirect()->back()->with('message','Category Added Successfully');
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

    public function update_product($id)
    {
        if(Auth::id()){
            $product = Product::find($id);
            $category = Category::find($id);
            return view('admin.updateProduct',compact('product','category'));
        }
    }

    public function update_product_confirm(Request $request,$id)
    {
        if(Auth::id()){
            $product = Product::find($id);
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->discount_price = $request->dis_price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;

            $image = $request->image;

            if ($image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('product', $imagename);
                $product->image = $imagename;
            }

            $product->save();
            return redirect()->back()->with('message', 'Product Updated successfully');
        }else{
            return redirect('login');
        }
    }
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        $product->save();
        return redirect()->save()->with("mesaages",'You successfully Deleted this');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        $category->save();
        return redirect()->save()->with("mesaages",'You successfully Deleted this');
    }

}
