<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function(Blueprint $table) {
			
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade')
				->onUpdate('cascade');
		});

		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')
				->references('id')
				->on('product_categories')
				->onDelete('restrict')
				->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_user_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_product_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
	}
}