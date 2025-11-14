
@extends('layout.Backend.main')

 @section('title','Add New brands')
 
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
            <h5 class="mb-2 mb-lg-0 p-2">Add New Brands</h5>
            <a href="{{ route('product.index') }}" class="btn btn-gry btn-mb">
                <i class="fas fa-table mr-1"></i> All Brands
            </a>
        </div>
        <div class="card p-4">

            <form id="productForm" method="POST" action="{{ route('brands.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label class="form-label">Brand Name</label>
                            <input type="text" name="brand_title" class="form-control" placeholder="Enter brand name" required>
                        </div>

                        <div class="mb-3">
                                <label class="form-label"> Category</label>
                                <select class="form-select" name="category">
                                     <option>Select Category</option>
                                      @foreach($category as $cat)
                                       <option value="{{ $cat->cat_id }}"> {{ $cat->cat_title }}</option>
                                     @endforeach
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