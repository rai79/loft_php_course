<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $guarded = ['id'];

	protected $fillable = [
		'email'
	];

	public static function storeNotification($email)
	{
		$notification = new Notification();
		$notification->email = $email;
		return $notification->save();
	}

}
