<?php namespace Zeropingheroes\Lanager\Domain\ProductCategories;

use Zeropingheroes\Lanager\Domain\BaseModel;

class ProductCategory extends BaseModel {

	protected $table = 'product_categories';

	protected $fillable = [ 'name' ];

	public $timestamps = true;

	public function products()
	{
		return $this->hasMany('Zeropingheroes\Lanager\Domain\Products\Product', 'category_id');
	}

}