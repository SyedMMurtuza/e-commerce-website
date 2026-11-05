@extends('layout.app')

@section('title', 'Women')

@section('content')
    <x-product_grid :shops="$products" />
@endsection
