<?php namespace Zeropingheroes\Lanager\Http\Gui;

use Zeropingheroes\Lanager\Domain\Orders\OrderService;
use Zeropingheroes\Lanager\Domain\Users\UserService;
use Zeropingheroes\Lanager\Domain\Products\ProductService;
use View;
use Redirect;

class OrdersController extends ResourceServiceController {

	/**
	 * Set the controller's service
	 */
	public function __construct()
	{
		$this->service 	= new OrderService;
		$this->users 	= lists( (new UserService)->all(), 'id', 'username' );
		$this->products = lists( (new ProductService)->all(), 'id', 'name' );

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = $this->service->all();

		return View::make( 'orders.index' )
					->with( 'title', 'Orders' )
					->with( 'orders', $orders );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make( 'orders.create' )
					->with( 'title', 'New Order' )
					->with( 'order', null )
					->with( 'products', $this->products );
	}

	/**
	 * Show the form for editing an existing resource.
	 *
	 * @return Response
	 */
	public function edit( $orderId )
	{
		$order = $this->service->single( $orderId );

		return View::make( 'orders.edit' )
					->with( 'title', 'Edit Order' )
					->with( 'order', $order )
					->with( 'products', $this->products );
	}

	protected function redirectAfterStore( $resource )
	{
		return Redirect::route('orders.index' );
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