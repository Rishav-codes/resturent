@extends('home.base')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <h2>Checkout</h2>

            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Enter Adderss details for delivery</h4>
                        <div class="text-danger">* Required</div>
                    </div>

                    <div class="card-body border-2">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label for="">FullName</label>
                                        <input type="text" class="form-control" value="{{ old('fullname') }}"
                                            name="fullname">
                                        @error('fullname')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">alt_contact</label>
                                        <input type="text" class="form-control" value="{{ old('alt_contact') }}"
                                            name="alt_contact">
                                        @error('alt_contact')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">landmark <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ old('landmark') }}"
                                            name="landmark">
                                        @error('landmark')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">street_name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('street_name') }}"
                                                    name="street_name">
                                                @error('street_name')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="">area <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('area') }}"
                                                    name="area">
                                                @error('area')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="">pincode <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('pincode') }}"
                                                    name="pincode">
                                                @error('pincode')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">city <span class="text-danger">*</span></label>
                                                <select class="form-control" value="{{ old('city') }}" name="city">
                                                    <option value="">Select Option</option>
                                                    <option value="Purnea">Purnea</option>
                                                    <option value="Bhagalpur">Bhagalpur</option>
                                                    <option value="Patna">Patna</option>
                                                </select>
                                                @error('city')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="">state <span class="text-danger">*</span></label>
                                                <select class="form-control" value="{{ old('state') }}" name="state">
                                                    <option value="">Select Option</option>
                                                    <option value="Bihar">Bihar</option>
                                                </select>
                                                @error('state')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="">Type
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <br>
                                                <input type="radio" name="type" value="o"> Office
                                                <input type="radio" name="type" checked value="h"> Home
                                                @error('type')
                                                    <p class="text-danger small">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <input type="submit" class="btn btn-success btn-lg w-100" value="Save Address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- checked Address id  --}}
            <div class="col-4">
                <form action="" method="post">
                    @csrf
                    <input type="text" name="amount" value="{{session("amount")}}">
                    <div class="grid">
                        @foreach ($addresses as $add)
                            <label class="card">
                                <input name="address_id" class="radio" type="radio" value="{{ $add->id }}"
                                    checked>
                                <span class="plan-details">
                                    <span class="plan-type">
                                        {{ $add->type === 'o' ? 'Office' : ($add->type === 'h' ? 'Home' : 'Unknown') }}
                                    </span>
                                    <span class="plan-cost">{{ $add->fullname }}</span>
                                    <span>
                                        {{ $add->street_name }} | {{ $add->area }}, <br>
                                        {{ $add->landmark }} |{{ $add->city }} ,<br>
                                        {{ $add->pincode }} | ({{ $add->state }})
                                    </span>
                                </span>
                            </label>
                        @endforeach
                    </div>

                    <div class="mt-3 ">
                        <input type="submit" class="btn btn-primary btn-lg w-100 " value="Make payment">
                    </div>
                </form>
            </div>
        </div>
    @endsection
