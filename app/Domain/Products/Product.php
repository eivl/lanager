<?php namespace Zeropingheroes\Lanager\Domain\Products;

use Zeropingheroes\Lanager\Domain\BaseModel;

class Product extends BaseModel {

	public $timestamps = true;

	protected $fillable = [ 'category_id', 'name', 'price' ];

	public function category()
	{
		return $this->belongsTo('Zeropingheroes\Lanager\Domain\ProductCategories\ProductCategory');
	}

}