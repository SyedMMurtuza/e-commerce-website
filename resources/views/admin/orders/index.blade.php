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
                            <td>{{ $item->user_type }}</td>
                            {{-- <td>
                                @if ($item->quantity > 0)
                                    <span class="badge bg-success">In Stock</span>
                                @else
                                    <span class="badge bg-danger">Out of Stock</span>
                                @endif
                            </td>

                            <td class="d-flex align-items-center gap-3">
                                <a href="{{ route('admin.shop.edit', $item->id) }}"
                                    class="shadow-sm btn btn-info text-white">Edit</a>

                                <form action="{{ route('admin.shop.delete', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>


@endsection
