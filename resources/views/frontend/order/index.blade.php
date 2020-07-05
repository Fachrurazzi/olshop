@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="column is-6">
            <h1 class="is-size-4 has-text-centered mb-2">Transaction History</h1>
            <p class="has-text-centered">This is your transaction history.</p>

            <table class="table is-bordered is-fullwidth">
                <tr>
                    <th>No</th>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Total Price</th>
                </tr>

                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('frontend.order.show', $order) }}">{{ $order->id }}</a></td>
                            <td>{{ $order->status }}</td>
                            <td class="has-text-right">{{ format_rupiah($order->total + $order->shipping_cost) }}</td>
                        </tr>
                    @endforeach

            </table>
            {{ $orders->links('vendor.pagination.bulma') }}
        </div>
    </div>
@endsection