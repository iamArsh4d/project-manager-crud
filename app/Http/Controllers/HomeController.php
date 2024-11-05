<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\user;

use Illuminate\Http\Request;
use App\Models\Products;

class HomeController extends Controller
{
    public function index()
    {
        $product = Products::paginate(12);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            // return view('home.userpage');
            return view('admin.home');
        } else {
            $product = Products::paginate(9);
            return view('home.userdash', compact('product'));
            // return view('home.userpage', compact('product'));
        }
    }
}
