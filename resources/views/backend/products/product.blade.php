@extends('layout.Backend.main')
@section('title', 'All products')
@section('main-content')

  <div class="container-fluid px-3 py-3 m-1">

     @if(session('success'))
    <div class="alert alert-success" role="alert">
       {{ session('success') }}
        @endif
    </div>
    
    <div class="card shadow-sm border-0 mx-3">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
        <h5 class="mb-2 mb-lg-0">All Products</h5>
        <a href="{{ route('product.create') }}" class="btn btn-light btn-sm">
          <i class="fa fa-plus me-1"></i> Add Product
        </a>
      </div>

      <div class="card-body p-0">
        <!-- ✅ Responsive Table Wrapper -->
        <div class="table-responsive">
          <table id="productsTable" class="table table-striped table-hover table-bordered align-middle mb-0">
            <caption class="px-3">List of Products</caption>
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Brand</th>
                <th>SubCategory</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Image</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($product_items  as $product)
                <tr>
                  <th scope="row">PDR00{{ $product->product_id }}</th>
                  <td class="text-truncate" style="max-width: 150px;">{{ $product->product_title }}</td>
                  <td>{{ $product->category->cat_title ?? '—' }}</td>
                  <td>{{ $product->brand->brand_name ?? '—' }}</td>
                  <td>{{ $product->sub_categorie->sub_cat_title ?? '—' }}</td>
                  <td>{{ number_format($product->product_price, 2) }}</td>
                  <td>{{ $product->product_qty }}</td>
                  <td>
                    @if($product->product_img)
                      <img src="{{ asset('storage/' . $product->product_img) }}" alt="{{ $product->product_title }}"
                        class="img-thumbnail" alt="Product" style="width:50px; height:50px; object-fit:cover;">
                    @else
                      <span class="text-muted small">No Image</span>
                    @endif
                  </td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-warning"><a href="{{ route('product.edit',$product->product_id) }}">
                     <i class="fa fa-edit"></i></a></button>

                    <form action="{{ route('product.destroy', $product->product_id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fa fa-trash"></i> Delete
                      </button>
                    </form>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection