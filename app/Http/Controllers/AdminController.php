<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    public function addCategory(Request $request)
    {
        $data = new Category;
        $data->C_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Added Successfully');
    }
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Deleted Successfully');
    }
    public function add_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }
    public function saveProduct(Request $request)
    {
        $product = new Products;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->d_price;

        // $image = $request->image;
        // $imagename = time() . '.' . $image->getClientOriginalExtension();
        // $request->$image->move('product', $imagename);
        // $product->image = $imagename;
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Get the uploaded file
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imagename); // Move to the 'product' folder
            $product->image = $imagename; // Save image name in the database field
        } else {
            return redirect()->back()->with('message', 'No image file was uploaded');
        }
        $product->save();
        return redirect()->back()->with('message', "Your Product is Live");
    }
    public function show_product()
    {
        $product = Products::all();
        return view('admin.show_product', compact('product'));
    }
    public function remove_product($id)
    {
        $product = Products::find($id);
        if ($product && ($product->role == auth()->user()->id || auth()->user()->role == "admin")) {
            $product->delete();
            return redirect()->back()->with('message', "Product removed");
        } else {
            return redirect()->back()->with('message', "Product not found");
        }
    }
    public function update_product($id)
    {
        $product = Products::find($id);
        $category = category::all();

        return view('admin.update_product', compact('product', 'category'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $product = Products::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->d_price;
        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Get the uploaded file
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imagename); // Move to the 'product' folder
            $product->image = $imagename; // Save image name in the database field
        }

        $product->save();

        return redirect()->back()->with('message', "Your Product was Updated");
    }



}
