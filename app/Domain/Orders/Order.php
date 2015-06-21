<?php namespace Zeropingheroes\Lanager\Domain\Orders;

use Zeropingheroes\Lanager\Domain\BaseModel;

class Order extends BaseModel {

	public $timestamps = true;

	protected $fillable = [ 'user_id', 'product_id', 'paid' ];

	public function user()
	{
		return $this->belongsTo('Zeropingheroes\Lanager\Domain\Users\User');
	}

	public function product()
	{
		return $this->belongsTo('Zeropingheroes\Lanager\Domain\Products\Product');
	}

}