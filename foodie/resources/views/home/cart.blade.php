@extends('home.base')

@section('content')
    @if ($order)
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-capitalize">My Cart ({{ $count = count($order->orderItem) }})</h2>
                </div>
                @if ($count)
                    <div class="col-8">
                        @php
                            $total_price = $total_discount_price = $net_payable = 0;
                            $delivery_charge = 50;
                        @endphp
                        @foreach ($order->orderItem as $item)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('storage/' . $item->product->image) }}" class="w-100"
                                                alt="">
                                        </div>
                                        <div class="col-10">
                                            <h2>{{ $item->product->title }}</h2>
                                            <div class="container">
                                                <h6>₹{{ $item->product->discount_price * $item->qty }}/-<del>₹{{ $item->product->price * $item->qty }}/-</del>
                                                </h6>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ route('removeFromeCart', $item->product->id) }}"
                                                    class="btn btn-outline-danger me-2 font-weight-bold">-</a>
                                                <span>{{ $item->qty }}</span>
                                                <a href="{{ route('addToCart', $item->product->id) }}"
                                                    class="btn btn-outline-success ms-2 font-weight-bold">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $total_price += $item->product->price * $item->qty;
                                $total_discount_price += $item->product->discount_price * $item->qty;
                            @endphp
                        @endforeach
                    </div>
                    <div class="col-4">
                        <div class="list-group">
                            <span class="list-group-item list-group-item-action">Total Price
                                <span class="float-end">₹{{ $total_price }}/-</span>
                            </span>
                            <span class="list-group-item list-group-item-action text-white bg-info ">Discount
                                <span class="float-end">₹{{ $total_price - $total_discount_price }}/-</span>
                            </span>
                            <span class="list-group-item list-group-item-action">Tax (GST 18%)
                                <span class="float-end">₹{{ $gst = $total_discount_price * 0.18 }}/-</span>
                            </span>
                            @php
                                $net_payable = $total_discount_price + $gst;
                                $delivery_charge = $net_payable <= 500 ? 50 : 0;
                            @endphp
                            <span class="list-group-item list-group-item-action">Delivery Charge
                                <span class="float-end">
                                    @if ($delivery_charge)
                                        <h5 class="text-danger">₹{{ $delivery_charge }}/-</h5>
                                    @else
                                        <h5 class="text-success">Free</h5>
                                    @endif
                                </span>
                            </span>
                            <span class="list-group-item list-group-item-action fw-bold bg-success text-white h3">Net
                                Payable
                                <span class="float-end">
                                    ₹{{ $total_payable_amount = $net_payable + $delivery_charge }}/-
                                    @php
                                        session()->flash('amount', $total_payable_amount);
                                    @endphp
                                </span>
                            </span>
                        </div>
                        <div class="d-flex mt-5 gap-2">
                            <div class="col">
                                <a href="" class="btn btn-dark  w-100 btn-lg">Add More</a>
                            </div>
                            <div class="col">
                                <a href="{{ route('checkout') }}" class="btn btn-success w-100 btn-lg ">Proceed</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12 text-center">
                        <div class="alert alert-info animate__animated animate__fadeIn" role="alert">
                            <h3 class="alert-heading">Your Cart is Empty!</h3>
                            <p>Looks like you haven't added any items to your cart. Start shopping now!</p>
                            <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">Go Back</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="col-12 text-center mt-3">
            <div class="alert alert-info animate__animated animate__fadeIn" role="alert">
                <h3 class="alert-heading">Your Cart is Empty!</h3>
                <p>Looks like you haven't added any items to your cart. Start shopping now!</p>
                <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">Go Back</a>
            </div>
        </div>
    @endif
@endsection
