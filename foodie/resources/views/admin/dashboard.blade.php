@extends('admin.adminBase')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h2 class="display-3">{{$categories}}</h2>
                                <h5>Total Categories</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <h2 class="display-3">{{$products}}+</h2>
                                <h5>Total Dishes</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 g-3">
                    <div class="col-6">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h2 class="display-3">21+</h2>
                                <h5>Happy Customer</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h2 class="display-3">28+</h2>
                                <h5>Total Order</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection