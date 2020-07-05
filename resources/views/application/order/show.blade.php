@extends('application.templates.default')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Order Detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Order Detail</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-body">
                    @include('application.templates.partials._alerts')

                    <h3>
                        <div class="text-center">Order Detail</div>
                    </h3>
                    <hr>

                    <h5>Order ID : {{ $order->id }}</h5>
                    <h5>Order Status : {{ $order->status }}</h5>
                    <h5>Amount : {{ format_rupiah($order->total * $order->shipping_cost) }}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 2px;">No</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 1;
                                    $no = 1;
                                    if(request()->has('page')) {
                                        $page = request('page');

                                        $no = config('olshop.pagination') * $page - (config('olshop.pagination') - 1);
                                    }
                                @endphp
                                @foreach ($order->orderDetails as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->product->name }}</td>
                                    <td><p class="text-right">{{ format_rupiah($item->product->price) }}</p></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2"><p class="text-right">Shipping Cost</p></td>
                                    <td><p class="text-right">{{ format_rupiah($order->shipping_cost) }}</p></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><p class="text-right">Grand Total</p></td>
                                    <td><p class="text-right">{{ format_rupiah($order->total * $order->shipping_cost) }}</p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection