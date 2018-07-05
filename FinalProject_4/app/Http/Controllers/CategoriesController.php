<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
	public function category($category_id)
	{
		$data['products'] = Product::where('category_id', $category_id)->paginate(6);
		$data['categories'] = Category::all();
		$data['current'] = Category::find($category_id);
		return view('categories.category', $data);
	}
}
