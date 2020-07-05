@extends('application.templates.default')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
                <h4 class="page-title">Orders</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    @include('application.templates.partials._alerts')

                    <h4 class="mb-4 header-title">
                        Data Orders
                    </h4>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 2px;">No</th>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Courier</th>
                                    <th>Total</th>
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
                                @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td><a href="{{ route('order.show', $order) }}">{{ $order->id }}</a></td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->courier }}</td>
                                    <td>{{ format_rupiah($order->total) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="body-footer mt-4">
                        {{ $orders->links('vendor.pagination._admin') }}
                    </div>
                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection