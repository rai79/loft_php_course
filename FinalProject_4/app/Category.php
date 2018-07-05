<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = ['id'];
	protected $table = "categories";

	public static function storeCategory($name, $description)
	{
		$сategory = new Category();
		$сategory->name = $name;
		$сategory->description = $description;
		return $сategory->save();
	}
}
