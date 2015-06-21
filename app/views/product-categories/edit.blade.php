@extends('layouts.default')
@section('content')
	@include('layouts.default.title')
	@include('layouts.default.alerts')

	{{ Form::model($productCategory, ['route' => ['product-categories.update', $productCategory->id], 'method' => 'PUT', 'class' => 'form-horizontal']) }}
		@include('product-categories.partials.form')
	{{ Form::close() }}

@endsection
