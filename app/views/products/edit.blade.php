@extends('layouts.default')
@section('content')
	@include('layouts.default.title')
	@include('layouts.default.alerts')

	{{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'PUT', 'class' => 'form-horizontal'] ) }}
		@include('products.partials.form')
	{{ Form::close() }}
@endsection
