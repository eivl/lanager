<?php namespace Zeropingheroes\Lanager\Http\Gui;

use Zeropingheroes\Lanager\Domain\Products\ProductService;
use Zeropingheroes\Lanager\Domain\ProductCategories\ProductCategoryService;
use View;
use Redirect;

class ProductsController extends ResourceServiceController {

	/**
	 * Set the controller's service
	 */
	public function __construct()
	{
		$this->service = new ProductService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = $this->service->all();

		return View::make( 'products.index' )
					->with( 'title', 'Products' )
					->with( 'products', $products );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$productCategories = ['' => ''] + lists( (new ProductCategoryService)->all(), 'id', 'name' );

		return View::make( 'products.create' )
					->with( 'title', 'Create Product' )
					->with( 'productCategories', $productCategories )
					->with( 'product', null);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = $this->service->single($id);

		$productCategories = ['' => ''] + lists( (new ProductCategoryService)->all(), 'id', 'name' );

		return View::make( 'products.edit' )
					->with( 'title', 'Edit Product' )
					->with( 'productCategories', $productCategories )
					->with( 'product', $product );
	}

	protected function redirectAfterStore( $resource )
	{
		return Redirect::route('products.index');
	}

	protected function redirectAfterUpdate( $resource )
	{
		return $this->redirectAfterStore( $resource );
	}

	protected function redirectAfterDestroy( $resource )
	{
		return Redirect::route('products.index');
	}

}