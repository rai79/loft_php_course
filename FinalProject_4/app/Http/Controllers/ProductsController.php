<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\newOrderPosted;
use App\Notification;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
	public function product($product_id)
	{
		$data['categories'] = Category::all();
		$data['product'] = Product::find($product_id);
		return view('products.product', $data);
	}

	public function buy($product_id, Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200',
			'email' => 'required|string|email|max:255'
		]);

		$order = Order::storeOrder($product_id, Auth::user()->id, $request->email, $request->name);

		$notifications = Notification::all();
		$data['product'] = Product::find($product_id);
		$data['user_name'] = $request->name;
		$data['user_email'] = $request->email;

		foreach ($notifications as $notification) {
			Mail::to($notification->email)->send(new newOrderPosted($data));
		}

		return redirect()->route('home');
	}
}
