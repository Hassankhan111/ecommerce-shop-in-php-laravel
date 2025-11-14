@extends('layout.frontend.main')
@section('title', 'cart')
@section('main-content')

    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                <h4 class="modal-title b-2" id="exampleModalLabel"><b>My Wishlist</b></h4>

                <table id="productsTable" class="table table-striped table-hover table-bordered align-middle mb-1">
                    <caption class="px-3">My Wishlist</caption>
                    <thead class="table-light">
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($single_product as $product)
                            <tr>
                                <td>
                                    @if($product->product_img)
                                        <img src="{{ asset('storage/' . $product->product_img) }}"
                                            alt="{{ $product->product_title }}" class="img-thumbnail" alt="Product"
                                            style="width:50px; height:50px; object-fit:cover;">
                                    @else
                                        <span class="text-muted small">No Image</span>
                                    @endif
                                </td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $product->product_title }}</td>
                                <td>{{ number_format($product->product_price, 2) }}</td>
                               
                                <td class="text-center">

                                    <form action="{{ route('product.destroy', $product->product_id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                              <div class="alert alert-danger" role="alert">
                        <p>You are Wishlist is Empty.</p>
                    </div>
                        @endforelse
                    </tbody>
                </table>
                
                    <a href="{{ url('wishlist', $products->product_id) }}" class="primary-btn">ADD TO CARD</a>
            </div>
        </div>
    </div>

@endsection