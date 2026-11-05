@php
    $slider = [
        [
            'image' => 'slider-1.webp',
            'heading' => "WOMEN'S CANVAS CRUISER SLIP ON",
            'para' => 'Warm White',
            'price' => '$75',
            'label' => 'new',
        ],
        [
            'image' => 'slider-2.webp',
            'heading' => "WOMEN'S Tree Runner NZ",
            'para' => 'Medium Grey',
            'price' => '$100',
            'label' => 'old',
        ],
        [
            'image' => 'slider-3.webp',
            'heading' => "MEN'S RUNNER NZ SLIP ON",
            'para' => 'Mushroom',
            'price' => '$105',
            'label' => 'new',
        ],
        [
            'image' => 'slider-4.webp',
            'heading' => "MEN'S RUNNER NZ SLIP ON",
            'para' => 'Anthracite',
            'price' => '$105',
            'label' => 'new',
        ],
        [
            'image' => 'slider-5.webp',
            'heading' => "WOMEN'S RUNNER NZ SLIP ON",
            'para' => 'Dark Navy',
            'price' => '$105',
            'label' => 'new',
        ],
        [
            'image' => 'slider-6.webp',
            'heading' => "WOMEN'S CANVAS CRUISER ",
            'para' => 'Sea Spray',
            'price' => '$75',
            'label' => 'old',
        ],
    ];
@endphp

<section class="best_sellers">
    <div class="container-fluid">
        <div class="best_sellers_head d-flex justify-content-between align-items-center">
            <h2>BEST SELLERS</h2>
            <div class="slider-arrows">
                <button class="prev-btn"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="next-btn"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>

        <div class="product-slider">
            @foreach ($slider as $item)
                <div class="product-card">
                    @if (($item['label'] ?? 'new') === 'new')
                        <span class="badge-new">NEW</span>
                    @endif

                    <img src="{{ asset('assets/images/shoes/' . $item['image']) }}" alt="{{ $item['heading'] }}">
                    <h3>{{ $item['heading'] }}</h3>
                    <p>{{ $item['para'] }}</p>
                    <div class="d-flex justify-content-between">
                        <strong>{{ $item['price'] }}</strong>
                        <span style="    display: flex;gap: 5px;align-items: center;">
                            <i class="fa-solid fa-bag-shopping" style="font-size: 12px"></i>QUICK ADD</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
