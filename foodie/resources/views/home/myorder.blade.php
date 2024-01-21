@extends('home.base')

@section('content')

    <div class="container mt-5">
        @if ($order)
            <div class="row">
                <div class="col-12">
                    <h2 class="text-capitalize">My Order ({{ $count = count($order->orderItem) }})</h2>
                </div>
                @if ($count)
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                               <span class="float-start">
                                Order id: {{$payment->ORDERID}}
                               </span>
                               <span class="float-end">
                                Total Amount: {{$payment->TXNAMOUNT}}
                               </span>
                            </div>
                            <div class="card-body">
                                @foreach ($order->orderItem as $item)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                                        class="w-100" alt="">
                                                </div>
                                                <div class="col-10">
                                                    <h2>{{ $item->product->title }}</h2>
                                                    <div class="container">
                                                        <h6>₹{{ $item->product->discount_price * $item->qty }}/-<del>₹{{ $item->product->price * $item->qty }}/-</del>
                                                        </h6>
                                                    </div>
                                                    <div class="col-4">
                                                        <span>Qty:{{ $item->qty }}</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <span class="small">{{date("D d-m-y h:i:s A",strtotime($order->updated_at))}}</span>
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
        @else
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="text-dark">Order Empty</h2>
                    <a href="{{ route('home.index') }}"class="btn btn-success">Start shopping</a>
                </div>
            </div>
        @endif
    </div>

@endsection
