@extends('home.base')

@section('content')
    <div class="text-white w-100"
        style="height: 500px; background-image: url('https://png.pngtree.com/back_origin_pic/03/91/31/216a8c258305188af56217c3b58b99c5.jpg');">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1 class="mt-5 text-dark font-weight-bolder">Explorer Food</h1>
            <form action="" method="get" class="d-flex justify-content-center flex-column gap-4">
                <input type="search" name="search" value="" class="form-control-lg" size="70">
                <input type="submit" class="btn btn-warning btn-lg">
            </form>
        </div>
    </div>
    <div class="container">
        @foreach ($categories as $cat)
            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-capitalize h4 text-secondary">{{ $cat->cat_title }}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($cat->products as $item)
                        <div class="col-3">
                            <div class="card rounded-0">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card border-0 rounded-0">
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                style="object-fit:cover; height;100px; " alt="">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body p-1">
                                            <h6 class="small mb-0">{{ $item->title }}</h6>
                                            @if ($item->isVeg)
                                                <img height="30px" src="{{ asset('icons/v.png') }}" alt="">
                                            @else
                                                <img height="30px" src="{{ asset('icons/nv.png') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <span class="text-success fw-bold">
                                                    Rs. {{ $item->discount_price }}/-
                                                </span>
                                                <del class="small text-muted">Rs. {{ $item->price }}/-</del>
                                            </div>
                                        </div>
                                        <span class="float-end mb-2 mt-3">
                                            <a href="{{ route('addToCart', $item->id) }}"
                                                class="btn btn-success btn-sm small rounded-0">Add
                                                to Cart</a>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <hr>
        @endforeach
    </div>
@endsection
