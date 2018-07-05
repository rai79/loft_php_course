<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = ['id'];

	public static function storeOrder($product_id, $user_id, $user_email, $user_name)
	{
		$order = new Order();
		$order->product_id = $product_id;
		$order->user_id = $user_id;
		$order->user_email = $user_email;
		$order->user_name = $user_name;
		return $order->save();
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
