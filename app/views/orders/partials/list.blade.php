@if (count($orders))
	<table class="table">
		<thead>
			<tr>
				<th>User</th>
				<th>Product</th>
				<th>Price</th>
				<th>Created</th>
				<th class="text-center">Status</th>
				@if ( Authority::can('manage', 'orders') )
					<th class="text-left"></th>
					<th class="text-center">{{ Icon::cog() }}</th>
				@endif
			</tr>
		</thead>
		<tbody>
		@foreach( $orders as $order )
			<tr>
				<td>
					@include('users.partials.avatar-username', ['user' => $order->user ])
				</td>
				<td>
					{{{ $order->product->name }}}
				</td>
				<td>
					{{{ $order->product->price }}}
				</td>
				<td>
					<span title="{{ $order->created_at }}">
						{{ $order->created_at->diffForHumans() }}
					</span>
				</td>
				<td class="text-center">
					@if( $order->paid )
						{{ Label::success('Paid') }}
					@else
						{{ Label::danger('Unpaid') }}
					@endif
				</td>
				@if ( Authority::can('manage', 'orders') )
					<td class="text-left">
						@include('orders.partials.mark-paid-button', ['order' => $order])
					</td>
					<td class="text-center">
						@include(
							'buttons.destroy',
							[
								'resource' => 'orders',
								'item' => $order,
								'parameters' =>
								[
									'order_id' => $order->order_id,
								],
							])
					</td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>
@else
	<p>No signups to show!</p>
@endif