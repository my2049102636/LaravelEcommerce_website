<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user=User::where('usertype','user')->get()->count();
        $products=product::all()->count();
        $order=Order::all()->count();
        $product=product::all()->count();
        $delivered=Order::where('status','delivered')->get()->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }


    public function home()
    {

        $product = product::all();


        if (Auth::id()) {
            $user = auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home_content.index', compact('product', 'count'));
    }


    public function login_home()
    {
        $product = product::all();

        if (Auth::id()) {
            $user = auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home_content.index', compact('product', 'count'));
    }
    public function product_detail($id)
    {
        if (Auth::id()) {
            $user = auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        $products = Product::findOrFail($id);
        return view('home_content.product_detail', compact('products', 'count'));
    }



    public function add_to_cart($id)
    {

        $user = Auth::user();



        $product_id = $id;
        $user_id = $user->id;

        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();
        toastr()->closeButton()->info('product added successfully.');
        return redirect()->back();
    }

    public function mycart(){
        if (Auth::id()) {
            $user = auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        } 
        return view('home_content.mycart',compact('count','cart'));
    }

    public function confirm_order(Request $request){

        $name=$request->receiver_name;

        $address=$request->receiver_address;

        $phone=$request->receiver_phone;

        $userid = Auth::user()->id;

        $cart=Cart::where('user_id',$userid)->get();

        foreach($cart as $carts){

       

        $order= new Order;

        $order->name=$name;

        $order->rec_address=$address;

        $order->phone=$phone;

        $order->user_id=$userid;

        $order->product_id=$carts->product_id;

        $order->save();
    }
        return redirect()->back();
    }

    
  
}
