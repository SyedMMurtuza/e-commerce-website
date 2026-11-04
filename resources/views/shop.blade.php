@extends('layout.app')

@section('title', 'Shop')

@section('content')
    <x-product_grid :shops="$shops" />
@endsection