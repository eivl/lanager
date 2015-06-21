@if ( isset(Auth::user()->id) )
	@include(
		'buttons.store',
		[
			'resource' => 'orders',
			'text' => 'Order',
			'size' => 'small',
			'icon' => 'shoppingCart',
			'hover' => 'Order this product',
			'parameters' => [],
			'data' => ['product_id' => $product->id, 'user_id' => Auth::user()->id],
		])
@endif