<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = ['id'];

	public static function storeProduct($name, $category_name, $description, $price, $path)
	{
		$category = Category::where('name', $category_name)->first();
		if($category) {
			$product = new Product();
			$product->name = $name;
			$product->category_id = $category->id;
			$product->description = $description;
			$product->price = $price;
			$product->pic_url = $path;
			return $product->save();
		} else {
			Category::storeCategory($category_name,"");
			$category = Category::where('name', $category_name)->first();
			$product = new Product();
			$product->name = $name;
			$product->category_id = $category->id;
			$product->description = $description;
			$product->price = $price;
			$product->pic_url = $path;
			return $product->save();
		}
	}

	static public function searchProduct($search)
	{
		$data = self::where('name','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->paginate(6);
		return $data;
	}

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}

}
