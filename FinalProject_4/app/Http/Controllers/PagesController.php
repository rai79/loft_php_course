<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function news()
	{
		$categories = Category::all();
		$data['categories'] = $categories;
		return view('news', $data);
	}

	public function about()
	{
		$categories = Category::all();
		$data['categories'] = $categories;
		return view('about', $data);
	}

	public function search(Request $request)
	{
		$this->validate($request, [
			'search' => 'required|string|max:255'
		]);

		$categories = Category::all();
		$data['categories'] = $categories;
		$data['products'] = Product::searchProduct($request->search);
		return view('search', $data);

	}


}
