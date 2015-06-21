@include(
	'buttons.update',
	[
		'resource' => 'orders',
		'size' => 'small',
		'hover' => ( $order->paid == 0 ? 'Mark as paid' : 'Mark as unpaid' ),
		'icon' => 'refresh',
		'item' => $order,
		'data' =>
			[
				'paid' => (($order->paid-1)*-1),
			],
	])