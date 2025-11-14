
@extends('layout.Backend.main')

 @section('title','Add products')
 
@section('main-content')

    <style>
        .content {
            padding: 30px;
        }

        .btn-submit {
            background-color: #ff4500;
            color: white;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #e03e00;
        }
    </style>

    <div class="content">
        <div class="card-header bg-primary text-white d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="mb-2 mb-lg-0 p-2">Add New Products</h5>
            <a href="{{ route('product.index') }}" class="btn btn-gry btn-mb">
                <i class="fas fa-table mr-1"></i> All Products
            </a>
        </div>
        <div class="card p-4">

            <form id="productForm" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Product Title</label>
                            <input type="text" name="product_title" class="form-control" placeholder="Enter product title" required>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Product Category</label>
                                <select class="form-select" name="product_cat">
                                     <option>Select Category</option>
                                      @foreach($category as $cat)
                                       <option value="{{ $cat->cat_id }}"> {{ $cat->cat_title }}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Product Sub-Category</label>
                                <select class="form-select" name="product_sub_cat">
                                   <option value="" selected disabled>First Select Category</option>
                                    @if($sub_categories->isEmpty())
                                    <option>First Select Category</option>
                                    @else
                                    @foreach($sub_categories as $sub_cat)
                                    <option value="{{ $sub_cat->sub_cat_id }}">{{ $sub_cat->sub_cat_title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Product Brand</label>
                                <select class="form-select" name="product_brand">
                                     <option>First Select Sub Category</option>

                                       @foreach($brands as $brand)
                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Product Description</label>
                            <textarea class="form-control" name="product_desc" rows="6" placeholder="Enter product description..."></textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="product_img" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Price</label>
                            <input type="number" name="product_price" class="form-control" placeholder="Enter price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Available Quantity</label>
                            <input type="number" name="product_qty" class="form-control" placeholder="Enter quantity">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="product_status">
                                <option>Publish</option>
                                <option>Draft</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-submit">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
</body>

</html>