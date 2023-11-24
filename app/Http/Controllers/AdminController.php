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

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        $category->save();

        return redirect()->save()->with("mesaages",'You successfully Deleted this');
    }

}
