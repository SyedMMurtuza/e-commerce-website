@php
    $collection = [
        [
            'image' => 'col-1.webp',
            'heading' => 'Terralux™ Collection',
        ],
        [
            'image' => 'col-2.webp',
            'heading' => 'New Arrivals',
        ],
        [
            'image' => 'col-1.webp',
            'heading' => 'All-Weather',
        ],
    ];
@endphp

<section class="collection">
    <div class="container-fluid">
        <div class="row g-3">
            @foreach ($collection as $item)
                <div class="col-lg-4">
                    <div class="collection-card">
                        <img src="{{ asset('assets/images/shoes/' . $item['image']) }}" alt="{{ $item['heading'] }}">
                        <h2>{{ $item['heading'] }}</h2>
                        <div class="collection-btns">
                            <a href="#">Shop Men</a>
                            <a href="#">Shop Women</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
