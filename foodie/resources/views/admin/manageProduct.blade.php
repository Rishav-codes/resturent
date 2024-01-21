@extends('admin.adminBase')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="container">
                    <h2 class="display-6 float-start">Manage Product({{ count($products) }})</h2>
                    <a href="{{route('admin.product.insert')}}" class="btn btn-success float-end">Insert Product</a>
                </div>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>IsVeg</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your product data here -->
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>

                                    @if ($item->isVeg)
                                        <img src="{{ asset('icons/v.png') }}" alt="">
                                    @else
                                        <img src="{{ asset('icons/nv.png') }}" alt="">
                                    @endif

                                </td>

                                <td>{{ $item->discount_price }}<del>{{ $item->Price }}</del></td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->image) }}" width="100px" alt="">

                                </td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->category->cat_title }}</td>

                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-danger">X</a>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
