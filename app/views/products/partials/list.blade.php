@if (count($products))
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Price</th>
				<th>Category</th>
				@if ( Authority::can('create', 'orders') )
					<th></th>
				@endif
				@if ( Authority::can('manage', 'products') )
					<th class="text-center">{{ Icon::cog() }}</th>
				@endif
			</tr>
		</thead>
		<tbody>
		@foreach( $products as $product )
			<tr>
				<td>
					{{ $product->name }}
				</td>
				<td>
					{{ $product->price }}
				</td>
				<td>
					{{ $product->category->name }}
				</td>
				<td>
					@include('products.partials.order-button', ['product' => $product] )
				</td>
				@if ( Authority::can('manage', 'products') )
					<td class="text-center">
						@include('buttons.edit', ['resource' => 'products', 'item' => $product, 'size' => 'extraSmall'])
						@include('buttons.destroy', ['resource' => 'products', 'item' => $product, 'size' => 'extraSmall'])
					</td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>
@else
	<p>No products found!</p>
@endif