<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.home");
    }

    public function view_product()
    {
        return view('');
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
