@extends('layout.Backend.main') {{-- optional if you have a main admin layout --}}
@section('title', 'Edit Product')
@section('main-content')

<div class="container-fluid">
    <div class="row m-2 p-3">
        <!-- Main Content -->
        <div class="col-md-10 p-4 m-1">

            <form action="{{ route('product.update',  $products->product_id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-8">
                        <!-- Product Title -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Title</label>
                            <input type="text" name="product_title" class="form-control" value="{{ old('product_title', $products->product_title) }}" required>
                        </div>

                        <!-- Category & Subcategory -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Product Category</label>
                                <select name="category" class="form-select">

                                   <option value="">Select Category</option>
                                   @foreach($category as $categorys)
                                    @if($products->product_cat == $categorys->cat_id)
                                    <option selected value="{{$categorys->cat_id }}"> {{ $categorys->cat_title }} </option>
                                     @else
                                       <option value="{{$categorys->cat_id}}"> {{ $categorys->cat_title }} </option>
                                    @endif
                                    @endforeach

                                <select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Product Sub-Category</label>
                                <select name="subcategory" class="form-select">

                                  <option value="">Select SubCategory</option>
                                   @foreach($sub_categories as $subcategory)
                                    @if($products->product_sub_cat == $subcategory->sub_cat_id)
                                    <option selected value="{{$subcategory->sub_cat_id }}"> {{ $subcategory->sub_cat_title }} </option>
                                     @else
                                       <option value="{{$subcategory->sub_cat_id}}"> {{ $subcategory->sub_cat_title }} </option>
                                    @endif
                                    @endforeach

                               </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Product Brand</label>
                                  <select name="brand" class="form-select">
                                   <option value="">Select Brands</option>
                                   @foreach($brands as $brand)
                                    @if($products->product_brand == $brand->brand_id)
                                    <option selected value="{{$brand->brand_id }}"> {{ $brand->brand_name }} </option>
                                     @else
                                       <option value="{{$brand->brand_id}}"> {{ $brand->brand_name }} </option>
                                    @endif
                                    @endforeach
                               </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Description</label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description', $products->product_desc) }}</textarea>
                        </div>
                    </div>

                    <!-- Right Sidebar -->
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label class="form-label fw-bold d-block">Featured Image</label>
                            @if($products->product_img)
                                <img src="{{ asset('storage/' . $products->product_img) }}" alt="Product Image" width="120" class="rounded mb-2 border">
                            @endif
                            <input type="file" name="product_img" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Price</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $products->product_price) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Available Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $products->product_qty) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select">
                                <option value="Published" {{ $products->product_status == 'Published' ? 'selected' : '' }}>Published</option>
                                <option value="Draft" {{ $products->product_status == 'Draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 fw-bold">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
