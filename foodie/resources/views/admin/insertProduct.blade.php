@extends('admin.adminBase')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto mt-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Insert Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.insert') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                @error('title')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex">

                                <input type="radio" class="form-check" name="isVeg" value="1" checked>Veg
                                <input type="radio" class="form-check ms-3" name="isVeg" value="0">Non-Veg
                                @error('is_Veg')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">price</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                @error('price')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="">Discount Price</label>
                                <input type="text" name="discount_price" value="{{ old('discount_price') }}"
                                    class="form-control">
                                @error('discount_price')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category Here</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->cat_title }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="submit" class="btn btn-success w-100" value="Insert Product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
