@extends('layout.app')

@section('title', 'Home')

@section('content')
    {{-- <div class="container py-5">
        <h1>Hello <i class="fa-solid fa-heart"></i></h1>
    </div> --}}
    <x-home-hero></x-home-hero>
    <x-hover-card></x-hover-card>
    <x-home-slider></x-home-slider>
@endsection
