@extends('layout.backend')

@section('content')
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

    <section class="pt-5 pb-5">
        <div class="container">
            {{-- <a href="/admin/shop/add" class="btn btn-success mb-3">Add +</a> --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>Order-id</th>
                        <th>Item_id</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Quantity</th>
                        <th>Created_at</th>
                        <th>Type</th>
                        <th>Order Status</th>
                        {{-- <th>Action</th> --}}
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
                            <td>{{ ucfirst($item->order->user->user_type ?? 'Guest') }}</td>
                            <td>
                                <form action="{{ route('admin.orders.status', $item->order_id) }}" method="POST"
                                    class="d-flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="order_status" class="form-select form-select-sm">
                                        @foreach (['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                                            <option value="{{ $status }}"
                                                {{ ($item->order->order_status ?? 'pending') === $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-dark btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>


@endsection
