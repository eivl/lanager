<?php namespace Zeropingheroes\Lanager\Http\Gui;

use Zeropingheroes\Lanager\Domain\ProductCategories\ProductCategoryService;
use View;
use Redirect;

class ProductCategoriesController extends ResourceServiceController {

	/**
	 * Set the controller's service
	 */
	public function __construct()
	{
		$this->service = new ProductCategoryService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$productCategories = $this->service->all();

		return View::make( 'product-categories.index' )
					->with( 'title', 'Product Categories' )
					->with( 'productCategories', $productCategories );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make( 'product-categories.create' )
					->with( 'title', 'Create Product Category' )
					->with( 'productCategory', null );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$productCategory = $this->service->single($id);

		return View::make( 'product-categories.edit' )
					->with( 'title', 'Edit Product Category' )
					->with( 'productCategory', $productCategory );
	}

	protected function redirectAfterStore( $resource )
	{
		return Redirect::route('product-categories.index', $this->currentRouteParameters() );
	}

	protected function redirectAfterUpdate( $resource )
	{
		return $this->redirectAfterStore( $resource );
	}

	protected function redirectAfterDestroy( $resource )
	{
		return $this->redirectAfterStore( $resource );
	}
}