<section class="ord_detail pt-5 pb-5">
    <table class="table p-5">
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
                    <td>{{ $item->unit_amount }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="bg-warning p-3 rounded">Pending</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</section>
