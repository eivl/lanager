@extends('layouts.default')
@section('content')
	@include('layouts.default.title')
	@include('layouts.default.alerts')

	@include('products.partials.list', ['products' => $products] )

	@include('buttons.create', ['resource' => 'products'])

@endsection
