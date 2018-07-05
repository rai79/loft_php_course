<?php

namespace App\Http\Controllers;

use App\Category;
use App\Notification;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.index');
	}

	public function products()
	{
		$products = Product::all();
		$data['products'] = $products;
		return view('admin.products', $data);
	}

	public function product_create()
	{
		return view('admin.product_create');
	}

	public function product_store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200',
			'category' => 'required|max:200',
			'description' => 'required',
			'price' => 'required|numeric',
			'picture' => 'image|dimensions:max_width=800,max_height=800'
		]);

		$path = asset(Storage::url($request->file('picture')->store('public/img/cover')));
		Product::storeProduct($request->name, $request->category, $request->description, $request->price, $path);
		return redirect()->route('admin.product_create');
	}

	public function product_edit($product_id)
	{
		$data['product'] = Product::find($product_id);
		return view('admin.product_edit', $data);
	}

	public function product_update($product_id, Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200',
			'category' => 'required|max:200',
			'description' => 'required',
			'price' => 'required|numeric',
			'picture' => 'image|dimensions:max_width=800,max_height=800'
		]);

		$path = asset(Storage::url($request->file('picture')->store('public/img/cover')));

		Product::find($product_id)->update($request->all());
		return redirect()->route('admin.products');
	}

	public function product_delete($product_id)
	{
		Product::destroy($product_id);
		return redirect()->route('admin.products');
	}

	public function categories()
	{
		$categories = Category::all();
		$data['categories'] = $categories;
		return view('admin.categories', $data);
	}

	public function category_create()
	{
		return view('admin.category_create');
	}

	public function category_store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200|unique:categories,name',
			'description' => 'required'
		]);

		Category::storeCategory($request->name, $request->description);
		return redirect()->route('admin.category_create');
	}

	public function category_edit($category_id)
	{
		$data['category'] = Category::find($category_id);
		return view('admin.category_edit', $data);
	}

	public function category_update($category_id, Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:200',
			'description' => 'required'
		]);

		Category::find($category_id)->update($request->all());
		return redirect()->route('admin.categories');
	}

	public function category_delete($category_id)
	{
		Category::destroy($category_id);
		return redirect()->route('admin.categories');
	}

	public function orders()
	{
		$orders = Order::all();
		$data['orders'] = $orders;
		return view('admin.orders', $data);
	}

	public function notifications()
	{
		$notifications = Notification::all();
		$data['notifications'] = $notifications;
		return view('admin.notifications', $data);
	}

	public function notification_create()
	{
		return view('admin.notification_create');
	}

	public function notification_store(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|string|email|max:255'
		]);

		Notification::storeNotification($request->email);
		return redirect()->route('admin.notification_create');
	}

	public function notification_edit($notification_id)
	{
		$data['notification'] = Notification::find($notification_id);
		return view('admin.notification_edit', $data);
	}

	public function notification_update($notification_id, Request $request)
	{
		$this->validate($request, [
			'email' => 'required|string|email|max:255'
		]);

		$notification = Notification::find($notification_id)->update($request->all());
		return redirect()->route('admin.notifications');
	}

	public function notification_delete($notification_id)
	{
		Notification::destroy($notification_id);
		return redirect()->route('admin.notifications');
	}

}
