@extends('layout.app')

@section('title', 'Men')

@section('content')
    <x-product_grid :shops="$products" />
@endsection
