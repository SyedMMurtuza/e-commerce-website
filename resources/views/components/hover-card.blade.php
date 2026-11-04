@php
    $cards = [
        [
            'image' => '1.webp',
            'main' => 'NEW ARRIVALS',
            'extra' => ['SHOP MEN', 'SHOP WOMEN'],
        ],
        [
            'image' => '2.webp',
            'main' => 'MENS',
            'extra' => ['SHOP MEN'],
        ],
        [
            'image' => '3.webp',
            'main' => 'WOMENS',
            'extra' => ['SHOP WOMEN'],
        ],
        [
            'image' => '4.webp',
            'main' => 'BEST SELLERS',
            'extra' => ['SHOP MEN', 'SHOP WOMEN'],
        ],
    ];
@endphp

<section class="hover_card pb-5">
    <div class="container container-1580">
        <div class="row">
            @foreach ($cards as $card)
                <div class="col-lg-3">
                    <div class="hover_box">
                        <img src="{{ asset('assets/images/shoes/' . $card['image']) }}" alt="{{ $card['main'] }}">

                        <div class="btn_group">
                            <a href="#" class="pill_btn">{{ $card['main'] }}</a>

                            @foreach ($card['extra'] as $label)
                                <a href="#" class="pill_btn extra_btn">{{ $label }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
