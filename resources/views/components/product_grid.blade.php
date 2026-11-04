<section class="mt-5 mb-5 product_grid">

    <div class="container container-1400">
        <div class="row">
            @foreach ($shops as $item)
                <div class="col-lg-3 mb-3">
                    <div class="position-relative">
                        {{-- @if  --}}
                        @if ($item->quantity == 0)
                            <span class="grid_badge bg-danger text-white">Out of Stock</span>
                        @elseif($item->badge === 'new')
                            <span class="grid_badge">New</span>
                        @else
                        @endif
                    </div>
                    <a href="{{ route('shop.detail', $item->slug) }}" class="text-decoration-none text-reset">
                        <div class="pro_grid">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="img-fluid">
                            <div class="grid_content">
                                <h6>{{ $item->title }}</h6>
                                <span>${{ $item->price }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
