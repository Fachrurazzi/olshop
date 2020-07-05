@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        @if ($items > 0)
        <div class="column is-8">
            <h1 class="is-size-4">Shopping Cart</h1>
            @php
                $totalItems = 0;
                $totalPrice = 0;
            @endphp
            @foreach ($items as $item)
                @php
                $totalItems += $item['qty'];
                $totalPrice += $item['price'];
                @endphp
                <div class="card mt-2">
                    <div class="card-header">
                        <p class="card-header-title">{{ $item['name'] }}</p>
                    </div>
                    <div class="card-content mb-4">
                        <div class="content">
                            <div class="columns">
                                <div class="column is-2">
                                    <img src="{{ $item['image'] }}" alt="" class="image is-64x64">
                                </div>

                                <div class="column is-10">
                                    <p>{{ $item['description'] }}</p>

                                    <p class="has-text-danger is-size-6">{{ format_rupiah($item['price']) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">

                    </div>
                </div>
            @endforeach
        </div>

        <div class="column is-4">
            <h1 class="is-size-4">Cart Detail</h1>
            <div class="card mt-2">
                <div class="card-content mb-4">
                    <div class="content">
                        <p class="has-text-weight-bold">Total Items : {{ $totalItems }} Items</p>
                        <p class="has-text-weight-bold">Total Price : {{ format_rupiah($totalPrice) }}</p>
                    </div>
                    <hr>
                    <a href="{{ route('checkout.index') }}" class="button is-danger is-fullwidth">Process to Payment</a>
                </div>
            </div>
        </div>

        @else
            <div class="card mt-2">
                <div class="card-content">
                    <div class="content">
                        <h1 class="is-size-6">No Items in Cart</h1>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection