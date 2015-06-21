@extends('layouts.default')
@section('content')
	@include('layouts.default.title')
	@include('layouts.default.alerts')

	@include('product-categories.partials.list')

	@include('buttons.create', ['resource' => 'product-categories'])
@endsection
