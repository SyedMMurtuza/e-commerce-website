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
                        <th>Amount</th>
                        <th>Created_at</th>
                        <th>Customer</th>
                        <th>Order Status</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $order)
                        <tr>
                            <td>{{ $order->order_number ?? '#' . $order->id }}</td>
                            <td>${{ $order->order_amount }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ ucfirst($order->user->first_name ?? 'guest') }}
                                @if (!empty($order->user->email))
                                    <br>
                                    <small>{{ $order->user->email }}</small>
                                @endif
                            </td>
                            <td>
                                @if ($order->order_status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif ($order->order_status == 'shipped')
                                    <span class="badge bg-primary">Shipped</span>
                                @elseif ($order->order_status == 'delivered')
                                    <span class="badge bg-success">Delivered</span>
                                @elseif ($order->order_status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td>
                                @if ($order->payment_method === 'cod')
                                    Cash on Delivery
                                @else
                                    Bank Transfer
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}">
                                    <i class="fa fa-eye p-2 rounded text-white fs-5" style="background: #1f2937"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
