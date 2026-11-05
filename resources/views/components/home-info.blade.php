@php
    $info = [
        [
            'heading' => 'Wear All Day Comfort',
            'para' =>
                'Lightweight, bouncy, and wildly comfortable, Allbirds shoes make any outing feel effortless. Slip in, lace up, or slide them on and enjoy the comfy support.',
        ],
        [
            'heading' => 'DESIGNED FOR EVERYDAY WEAR',
            'para' => 'Easy-to-wear styles made for daily routines, weekend plans, travel, and everything in between.',
        ],
        [
            'heading' => 'Materials From The Earth',
            'para' =>
                'We replace petroleum-based synthetics with natural alternatives wherever we can. Like using wool, tree fiber, and sugarcane. They’re soft, breathable, and better for the planet—win, win, win.',
        ],
    ];
@endphp

<section class="info pb-3">
    <div class="container-fluid">
        <div class="row">
            @foreach ($info as $item)
                <div class="col-lg-4">
                    <div class="info-content">

                        <h3>{{ $item['heading'] }}</h3>
                        <p>{{ $item['para'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
