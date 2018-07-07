<?php

namespace App\Http\Controllers;

use App\Category;
use App\Core\MainController;
use App\Mail\newOrderPosted;
use App\Notification;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

	private $session;
	private $cart;

	public function add($product_id, Request $request)
	{
		$this->session = $request->session();
		$products = [];
		$this->cart = $this->session->pull('cart');
		if (is_null($this->cart)) {
			array_push($products, $product_id);
			$this->cart['products'] = $products;
			$this->cart['count'] = 1;
			Session::put('cart', $this->cart);
		} else {
			if(!in_array($product_id, $this->cart['products'])) {
				array_push($this->cart['products'], $product_id);
				$this->cart['count']++;
				Session::put('cart',$this->cart);
			}
		}
		 return redirect()->back();
	}

	public function clear()
	{
		Session::forget('cart');
		return redirect('/');
	}


	public function delete($product_id, Request $request)
	{
		$this->session = $request->session();
		$this->cart = $this->session->pull('cart');
		if (!is_null($this->cart)) {
			if($key=array_search($product_id, $this->cart['products'])) {
				unset($this->cart['products'][$key]);
				$this->cart['count']--;
				Session::put('cart',$this->cart);
			}
		}
	}


	public function cart(Request $request)
	{
		$categories = Category::all();
		$data['categories'] = $categories;
		$products_id = Session::get('cart.products');
		$products = Product::find($products_id);
		$data['products'] = $products;
		$full_price = 0;
		foreach ($products as $product) {
			$full_price += $product->price;
		}
		$data['full_price'] = $full_price;
		return view('cart', $data);
	}

	public function buy(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200',
			'email' => 'required|string|email|max:255'
		]);

		$products_id = Session::get('cart.products');
		$products = Product::find($products_id);
		$full_price = 0;
		foreach ($products as $product) {
			$full_price += $product->price;
		}

		if(Auth::check()) {
			foreach ($products as $product) {
				Order::storeOrder($product->id, Auth::user()->id, $request->email, $request->name);
			}

			$notifications = Notification::all();

			$data['products'] = $products;
			$data['user_name'] = $request->name;
			$data['user_email'] = $request->email;
			$data['full_price'] = $full_price;

			foreach ($notifications as $notification) {
				Mail::to($notification->email)->send(new newOrderPosted($data));
			}
		} else {
			$notifications = Notification::all();
			$data['products'] = $products;
			$data['user_name'] = "НЕЗАРЕГИСТРИРОВАН с именем: ".$request->name;
			$data['user_email'] = $request->email;
			$data['full_price'] = $full_price;

			foreach ($notifications as $notification) {
				Mail::to($notification->email)->send(new newOrderPosted($data));
			}
		}

		Session::forget('cart');
		return redirect('/');
	}
}
