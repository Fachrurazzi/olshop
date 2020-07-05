@extends('layouts.app')

@section('content')
    <div class="columns is-centered">
        <div class="column is-6">
            <h1 class="is-size-4 has-text-centered mb-2">Order Detail</h1>

            @if ($order->status == "UNPAID")
                <p class="has-text-centered">This is your order detail, please make a payment to this account below to confirm your order.</p>

                <table class="table is-pulled-right">
                    <tr>
                        <td class="has-text-right">Bank Name</td>
                        <td>{{ config('olshop.bank.bank_name') }}</td>
                    </tr>
                    <tr>
                        <td class="has-text-right">Account Name</td>
                        <td>{{ config('olshop.bank.account_name') }}</td>
                    </tr>
                    <tr>
                        <td class="has-text-right">Account Number</td>
                        <td>{{ config('olshop.bank.account_number') }}</td>
                    </tr>
                    <tr>
                        <td class="has-text-right">Amount</td>
                        <td>{{ format_rupiah($order->total + $order->shipping_cost) }}</td>
                    </tr>
                </table>
            @else
                <p class="has-text-centered">This is your order detail, please make a payment to this account below to confirm your order.</p>

                <table class="table is-pulled-right">
                    <tr>
                        <td class="has-text-right">Order Status</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                    <tr>
                        <td class="has-text-right">Amount</td>
                        <td>{{ format_rupiah($order->total + $order->shipping_cost) }}</td>
                    </tr>
                </table>
            @endif

            <table class="table is-bordered is-fullwidth">
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Price</th>
                </tr>

                @foreach ($order->orderDetails as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td class="has-text-right">{{ format_rupiah($item->product->price) }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2" class="has-text-right">Shipping Cost</td>
                    <td class="has-text-right">{{ format_rupiah($order->shipping_cost) }}</td>
                </tr>

                <tr>
                    <td colspan="2" class="has-text-right">Total</td>
                    <td class="has-text-right">{{ format_rupiah($order->total + $order->shipping_cost) }}</td>
                </tr>
            </table>
        </div>

    </div>
@endsection