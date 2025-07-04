<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function home() {
        $query = Product::query();
        $product = $query->paginate(3);
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        
        return view('home.index', compact('product', 'count'));
    }

    public function login_home() {
        $query = Product::query();
        $product = $query->paginate(6);
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        
        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id) {
        $query = Product::query();
        $product = $query->paginate(5);
        $data = Product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = count(session()->get('cart', []));
        }
        
        return view('home.product_details', compact('data', 'count', 'product'));
    }

    public function our_shop() {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = count(session()->get('cart', []));
        }
        $category = Category::all();
        $product = Product::all();

        return view('home.shop_page', compact('category', 'product', 'count'));
    }

    public function getByCategory($id)
{
    $products = Product::where('category_id', $id)->get();
    return response()->json($products);
}

public function getAllProducts()
{
    $products = Product::all();
    return response()->json($products);
}


    public function category_products($id) {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = count(session()->get('cart', []));
        }
        $category = Category::all();
        $selected_category = Category::find($id);
        $product = Product::where('category_id', $id)->get();

        return view('home.shop_page', compact('category', 'product', 'selected_category', 'count'));
    }

    public function add_cart($id){
        if (Auth::id()) {
            $product_id = $id;
            $user = Auth::user();
            $user_id = $user->id;
            
            // Check if product already exists in cart
            $existingCartItem = Cart::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->first();

            if ($existingCartItem) {
                // Increment quantity if product exists
                $existingCartItem->quantity++;
                $existingCartItem->save();
            } else {
                // Create new cart item if product doesn't exist
                $data = new Cart;
                $data->user_id = $user_id;
                $data->product_id = $product_id;
                $data->quantity = 1;
                $data->save();
            }
        } else {
            // For guest users, store cart in session
            $cart = session()->get('cart', []);
            $product = Product::find($id);
            
            if($product) {
                if(isset($cart[$id])) {
                    $cart[$id]['quantity']++;
                } else {
                    $cart[$id] = [
                        'product_id' => $id,
                        'title' => $product->title,
                        'price' => $product->price,
                        'image' => $product->image,
                        'Weight' => $product->Weight,
                        'quantity' => 1
                    ];
                }
                session()->put('cart', $cart);
            }
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added to the Cart Successfully');
        return redirect()->back();
    }

    public function mycart()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('cart', compact('cartItems'));
    }
    

    public function about_us() {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } else {
            // For guest users, get cart from session
            $sessionCart = session()->get('cart', []);
            $count = count($sessionCart);
            $cart = collect();
            
            foreach($sessionCart as $id => $item) {
                $cart->push((object)[
                    'id' => $id,
                    'product' => (object)[
                        'id' => $item['product_id'],
                        'title' => $item['title'],
                        'price' => $item['price'],
                        'image' => $item['image'],
                        'Weight' => $item['Weight']
                    ],
                    'quantity' => $item['quantity']
                ]);
            }
        }
        return view('home.about-us', compact('count', 'cart'));
    }

    public function delete_cart($id) {
        if (Auth::id()) {
            $data = Cart::find($id);
            $data->delete();
        } else {
            // For guest users, remove from session
            $cart = session()->get('cart', []);
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('Cart Deleted Successfully');
        return redirect()->back();
    }
    public function checkout() {
        if (Auth::id()) {
            $cart = Cart::where('user_id', Auth::id())->get();
            $value = 0;
            foreach($cart as $item) {
                $value += $item->product->price * $item->quantity;
            }
        } else {
            // For guest users, get cart from session
            $sessionCart = session()->get('cart', []);
            $cart = collect();
            $value = 0;
            
            foreach($sessionCart as $id => $item) {
                $cart->push((object)[
                    'id' => $id,
                    'product' => (object)[
                        'id' => $item['product_id'],
                        'title' => $item['title'],
                        'price' => $item['price'],
                        'image' => $item['image'],
                        'Weight' => $item['Weight']
                    ],
                    'quantity' => $item['quantity']
                ]);
                $value += $item['price'] * $item['quantity'];
            }
        }
        return view('home.checkout', compact('cart', 'value'));
    }

}
