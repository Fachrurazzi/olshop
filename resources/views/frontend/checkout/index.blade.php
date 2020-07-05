@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="is-size-2 mb-2">Checkout</h1>
    <div class="columns">
        @if ($items > 0)
        <div class="column is-7">
            <h1 class="is-size-4 mb-4">Shipping Address</h1>
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <form method="POST" action="{{ route('checkout.store') }}">
                                @csrf

                                <div class="field">
                                    <label for="" class="label">Name</label>
                                    <p class="control has-icons-left">
                                    <input type="name" name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" placeholder="Name" value="{{ auth()->user()->name ?? old('name') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>

                                    @if ($errors->has('name'))
                                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="" class="label">E-mail Address</label>
                                    <p class="control has-icons-left">
                                    <input type="email" name="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" placeholder="Email" value="{{ auth()->user()->email ?? old('email') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-envelope"></i>
                                    </span>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="" class="label">Province</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="province" id="province" class="{{ $errors->has('province') ? 'is-danger' : '' }}">
                                                <option value="" disabled selected>Select a Province</option>
                                            </select>
                                        </div>
                                    </div>

                                    @if ($errors->has('province'))
                                        <p class="help is-danger">{{ $errors->first('province') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="" class="label">City</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="city" id="city" class="{{ $errors->has('city') ? 'is-danger' : '' }}">
                                                <option value="" disabled selected>Select a City</option>
                                            </select>
                                        </div>
                                    </div>

                                    @if ($errors->has('city'))
                                        <p class="help is-danger">{{ $errors->first('city') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="" class="label">Courier</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="courier" id="courier" class="{{ $errors->has('courier') ? 'is-danger' : '' }}">
                                                <option value="" disabled selected>Select a Courier</option>
                                                @foreach ($couriers as $key => $courier)
                                                    <option value="{{ $key }}">{{ $courier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @if ($errors->has('courier'))
                                        <p class="help is-danger">{{ $errors->first('courier') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="" class="label">Service</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="service" id="service" class="{{ $errors->has('service') ? 'is-danger' : '' }}">
                                                <option value="" disabled selected>Select a Service</option>
                                            </select>
                                        </div>
                                    </div>

                                    @if ($errors->has('service'))
                                        <p class="help is-danger">{{ $errors->first('service') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="" class="label">Address</label>
                                    <textarea type="text" name="address" class="textarea {{ $errors->has('address') ? 'is-danger' : '' }}" placeholder="Address" value="{{ old('address') }}" cols="5"></textarea>

                                    @if ($errors->has('address'))
                                        <p class="help is-danger">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>

                                <div class="field">
                                    <label for="" class="label">Phone</label>
                                    <p class="control has-icons-left">
                                    <input type="text" name="phone" class="input {{ $errors->has('phone') ? 'is-danger' : '' }}" placeholder="Phone" value="{{ old('phone') }}">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-phone"></i>
                                    </span>

                                    @if ($errors->has('phone'))
                                        <p class="help is-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <input type="text" name="shiping" id="shiping" style="display: none;" class="input" value="{{ old('shiping') }}">

                                <div class="field">
                                    <button type="submit" class="button is-primary">
                                        <span class="icon is-small">
                                            <i class="fa fa-save"></i>
                                        </span>
                                        <span>Checkout</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>

        <div class="column is-5">
        <h1 class="is-size-4 mb-4">Shopping Cart</h1>
            @php
                $totalItems = 0;
                $totalPrice = 0;
            @endphp
            @foreach ($items as $item)
                @php
                $totalItems += $item['qty'];
                $totalPrice += $item['price'];
                @endphp
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <div class="columns">
                                <div class="column is-2">
                                    <img src="{{ $item['image'] }}" alt="" class="image is-64x64">
                                </div>

                                <div class="column is-10">
                                    <p class="has-text-weight-bold">{{ $item['name'] }}</p>
                                    <p class="has-text-danger is-size-6">{{ format_rupiah($item['price']) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">

                    </div>
                </div>
            @endforeach

            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p class="has-text-weight-bold">Total Items : <span class="is-pulled-right">{{ $totalItems }} Items</span></p>
                        <p class="has-text-weight-bold">ETD : <span class="is-pulled-right" id="etd">-</span></p>
                        <p class="has-text-weight-bold">Shipping Cost : <span class="is-pulled-right" id="shipping_cost">-</span></p>
                        <p class="has-text-weight-bold">Total Price : <span class="is-pulled-right" id="total_price">{{ format_rupiah($totalPrice) }}</span></p>

                        <hr>

                        <p class="has-text-weight-bold">Grand Total : <span class="is-pulled-right" id="grand_total">{{ format_rupiah($totalPrice) }}</span></p>

                    </div>
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

@push('scripts')
    <script src="{{ asset('admin-assets/assets/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            function convertToRupiah(angka)
            {
                var rupiah = '';
                var angkarev = angka.toString().split('').reverse().join('');
                for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
                return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
            }

            function convertToAngka(rupiah)
            {
                return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
            }

            $.ajax({
                type : "GET",
                url : "{{ route('rajaongkir.province') }}",
                success : function(data) {

                    var provinces = data

                    provinces.forEach(function(province) {

                        // var provinsi = new Option(province.province_id, province.province)

                        // $(provinsi).html(province.province)

                        // $("select#province").append(provinsi)
                        $('#province').append('<option value="'+ province.province_id +'">' + province.province + '</option>')
                    });
                }
            });

            $('#province').change(function(){

                var provinceId = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "{{ route('rajaongkir.city') }}",
                    data: 'province_id=' + provinceId,
                    success: function(data) {

                        var cities = data
                        $('select#city').empty().append('<option disabled selected>Select a City</option>')
                        cities.forEach(function(city) {
                            $('select#city').append('<option value="'+ city.city_id +'">' + city.city_name + '</option>')
                        })
                    }
                });
            });

            $('#courier').change(function(){
                var courier = $('#courier').val()
                var cityId = $('#city').val()

                $.ajax({
                    type: "POST",
                    url: "{{ route('rajaongkir.cost') }}",
                    data: {
                        city: cityId,
                        courier: courier
                    },
                    success: function(data) {
                        var couriers = data.costs


                        $('select#service').empty().append('<option>Select a Service</option>')

                        couriers.forEach(function(courier) {
                            $('select#service').append('<option value="'+ courier.service +'">' +courier.description+ '('+ courier.service +') - ( Rp. '+courier.cost[0].value+' )</option>')
                        })


                    }
                })
            })

            $('#service').change(function(){
                var service = $(this).val()
                var courier = $('#courier').val()
                var cityId = $('#city').val()

                $.ajax({
                    type: "POST",
                    url: "{{ route('rajaongkir.cost') }}",
                    data: {
                        city: cityId,
                        courier: courier
                    },
                    success: function(data) {
                        var couriers = data.costs

                        var shipCost = couriers.find(function(cost) {
                            return cost.service == service
                        })

                        var totalPrice = convertToAngka($('#total_price').text())
                        var shippingCost = shipCost.cost[0].value
                        var grandTotal = totalPrice + shippingCost

                        $('#etd').text(shipCost.cost[0].etd + " days")
                        $('#shipping_cost').text(convertToRupiah(shippingCost))
                        $('#shiping').val(shippingCost)
                        $('#grand_total').text(convertToRupiah(grandTotal))
                    }
                })
            })
        });
    </script>
@endpush