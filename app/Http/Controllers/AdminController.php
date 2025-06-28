<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category() {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(request $request) {
        $category = new Category;

        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Category Added Successfully');
        return redirect()->back();
    }

    public function delete_category($id) {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id) {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(request $request,  $id) {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Category updated Successfully');
        return redirect('/view_category');
    }

    
    public function add_product() {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(request $request) {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->Weight = $request->Weight;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id;
        $image = $request->image;
        if($image) {
            $imagename = time(). '.' .$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product(Request $request) {
        $category = $request->input('category');
        $query = Product::query();

        if ($category) {
            $query->where('category', $category);
        }

        $product = $query->paginate(8);
        $categories = Category::all(); // Fetch all categories

        return view('admin.view_product', compact('product', 'categories'));
    }

    public function delete_product($id) {
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product deleted Successfully');
        return redirect()->back();
    }

    public function update_product(request $request,  $id) {
        
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page', data: compact('data', 'category'));
    }

    public function edit_product(Request $request, $id) {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id;
        $image = $request->image;
        if($image) {
            $imagename = time(). '.' .$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product updated Successfully');
        return redirect('/view_product');
    }

    public function product_search(Request $request) {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%'.$search.'%')->
        orWhere('category', 'LIKE', '%' .$search. '%')->
        paginate(2);
        
        return view('admin.view_product', compact('product'));
    }
}
