<section class="ord_detail pt-5 pb-5">
    <table class="table p-5 rounded">
        <thead>

            <tr>
                <th>Order Number</th>
                <th>Order ID</th>
                <th>Order Name</th>
                <th>Order Price</th>
                <th>Order Quantity</th>
                <th>Created At</th>
                <th>Order Status</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->order->order_number ?? '#' . $item->order_id }}</td>
                    <td>{{ $item->item_id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>${{ $item->unit_amount }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        @php $status = $item->order->order_status ?? 'pending'; @endphp
                        <span
                            class="badge p-2
        @switch($status)
            @case('processing') bg-info text-dark @break
            @case('shipped') bg-primary @break
            @case('delivered') bg-success @break
            @case('cancelled') bg-danger @break
            @default bg-warning text-dark
        @endswitch">
                            {{ ucfirst($status) }}
                        </span>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</section>
