{{ ControlGroup::generate(
	Form::label('name', 'Name'),
	Form::text('name',NULL, ['placeholder' => 'The name of the product', 'maxlength' => 255] ),
	NULL,
	2,
	9
)->withAttributes( ['class' => 'required'] )
}}

{{ ControlGroup::generate(
	Form::label('price', 'Price'),
	Form::number('price', NULL, ['step' => 'any']),
	NULL,
	2,
	9
)->withAttributes( ['class' => 'required'] ) }}

{{ ControlGroup::generate(
	Form::label('category_id', 'Category'),
	Form::select('category_id', $productCategories),
	NULL,
	2,
	9
)->withAttributes( ['class' => 'required'] ) }}

<div class="row">
	<div class="col-md-2 col-md-offset-2">
		{{ Button::normal('Submit')->submit() }}
	</div>
</div>

