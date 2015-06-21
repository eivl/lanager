@if (!empty($productCategories))

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Products</th>
				@if ( Authority::can('manage', 'product-categories') )
					<th class="text-center">{{ Icon::cog() }}</th>
				@endif
			</tr>
		</thead>
		<tbody>
		@foreach( $productCategories as $productCategory )
			<tr>
				<td>{{ $productCategory->name }}</td>
				<td>
					@include('plural', ['singular' => 'product', 'collection' => $productCategory->products ])
				</td>
				@if ( Authority::can('manage', 'product-categories') )
					<td class="text-center">
						@include('buttons.edit', ['resource' => 'product-categories', 'item' => $productCategory, 'size' => 'extraSmall'])
						@include('buttons.destroy', ['resource' => 'product-categories', 'item' => $productCategory, 'size' => 'extraSmall'])
					</td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>
@else
	<p>No event types to show!</p>
@endif
