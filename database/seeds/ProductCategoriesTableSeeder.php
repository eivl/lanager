<?php

use	Zeropingheroes\Lanager\Domain\ProductCategories\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesTableSeeder extends Seeder {

	/**
	 * Seed the product categories table with data
	 */
	public function run()
	{
		if( DB::table('product_categories')->count() ) return; // don't seed if table is not empty

		$productCategories = [
			['name' => 'Food'],
			['name' => 'Drink'],
			['name' => 'Hardware'],
		];

		foreach($productCategories as $productCategory)
		{
			ProductCategory::create($productCategory);
		}
	}
}
