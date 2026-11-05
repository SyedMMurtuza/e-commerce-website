@extends('layout.app')

@section('title', 'Search')

@section('content')
    <div class="container-fluid py-4">
        <h2>Results for "{{ $word }}"</h2>

        @if ($shops->count())
            <x-product_grid :shops="$shops" />
        @else
            <p>no Product Found</p>
        @endif
    </div>
@endsection
