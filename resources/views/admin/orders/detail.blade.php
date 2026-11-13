@extends('layout.backend')

@section('content')
    @php
        $statuses = ['pending', 'shipped', 'delivered', 'cancelled'];
        $badge = match ($order->order_status) {
            'pending' => 'warning',
            'shipped' => 'primary',
            'delivered' => 'success',
            'cancelled' => 'danger',
        };
    @endphp

    <section class="pt-5 pb-5">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
                <div>
                    <a href="{{ route('admin.orders.index') }}" class="text-decoration-none small">← Back to orders</a>
                    <h1 class="h3 mt-1 mb-0">
                        Order {{ $order->order_number ?? '#' . $order->id }}
                        <span class="badge bg-{{ $badge }} fs-6 align-middle ms-2">
                            {{ ucfirst($order->order_status) }}
                        </span>
                    </h1>
                    <small class="text-muted">Placed on
                        {{-- {{ $order->created_at->format('d M Y, h:i A') }} --}}
                        {{ $order->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>

            <div class="row g-4">

                <div class="col-lg-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white fw-semibold">Order Items</div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Price</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src="{{ $item->product?->image ? asset('storage/' . $item->product->image) : asset('images/placeholder.png') }}"
                                                        alt="{{ $item->product->title ?? 'Product' }}"
                                                        class="rounded border"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                    <span>{{ $item->product->title ?? ($item->title ?? 'Product') }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-end">${{ $item->unit_amount }}</td>
                                            <td class="text-end">${{ number_format($item->unit_amount * $item->qty, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>


                                        <th colspan="1" class="text-end">Total Qty</th>
                                        <th colspan="1" class="text-end">{{ $order->items->sum('qty') }}</th>
                                        <th colspan="1"class="text-end">Total</th>
                                        <th colspan="1"class="text-end">${{ number_format($order->order_amount, 2) }}
                                        </th>
                                    </tr>
                                    <tr>

                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-white fw-semibold">Update Status</div>
                        <div class="card-body">
                            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="order_status" class="form-select mb-3">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}"
                                            {{ $order->order_status === $status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-dark w-100">Update Status</button>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white fw-semibold fs-4 capitalize">
                            {{ ucfirst($order->user->user_type) }}
                        </div>
                        <div class="card-body">
                            <p class="mb-1 fw-semibold">
                                {{ $order->user ? trim(ucfirst($order->user->first_name) . ' ' . $order->user->last_name) : 'Guest' }}
                            </p>
                            @if (!empty($order->user->email))
                                <p class="mb-0 text-muted small"><strong class="text-dark">Email:
                                    </strong>{{ $order->user->email }}</p>
                            @endif
                            <p class="mb-0 text-muted small"><strong class="text-dark">Country:
                                </strong>{{ $order->user->country }}
                            </p>
                            <p class="mb-0 text-muted small"><strong class="text-dark">City:</strong>
                                {{ $order->user->city }}</p>
                            <p class="mb-0 text-muted small"><strong class="text-dark">Apartment:</strong>
                                {{ $order->user->apartment }}</p>
                            <p class="mb-0 text-muted small"><strong class="text-dark">Address:</strong>
                                {{ $order->user->address }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
