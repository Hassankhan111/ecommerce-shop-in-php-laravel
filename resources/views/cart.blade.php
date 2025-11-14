@extends('layout.frontend.main')
@section('title', 'cart')
@section('main-content')

    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                <h4 class="modal-title b-2" id="exampleModalLabel"><b>My Cart</b></h4>

                <table id="productsTable" class="table table-striped table-hover table-bordered align-middle mb-1">
                    <caption class="px-3">My Cart</caption>
                    <thead class="table-light">
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($single_product as $product)
                            <tr>
                                <td>
                                    @if($product->product_img)
                                        <img src="{{ asset('storage/' . $product->product_img) }}"
                                                    alt="{{ $product->product_img}}" class="img-thumbnail" alt="Product" style="width:50px; height:50px; object-fit:cover;">
                                    @else
                                        <span class="text-muted small">No Image</span>
                                    @endif
                                </td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $product->product_title }}</td>
                                <td>{{ number_format($product->product_price, 2) }}</td>
                                <td class="primary-btn">
                                    <div class="product__details__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                   sum of Price  {{ number_format($product->product_price, 2) }}
                                </td>
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
                                <p>You are Cart is Empty.</p>
                            </div>
                        @endforelse
                    </tbody>
                </table>
                <a class="btn btn-danger" href="{{route('home')}}">Continue Shopping</a>

                @if (Auth::check())
                     <form id="payment-form" action="{{ route('stripe.payment') }}" method="POST">
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                      @csrf
                      
                        <button type="submit" class="btn btn-success pull-right cheackoutbtn p-2 mb-5">
                           <i class="fa fa-credit-card">Proceed to Checkout </i>
                        </button>

                       </form>
                    <!--<form id="payment-form" action="{{ route('stripe.payment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        <input type="hidden" name="amount" value="{{ $product->product_price }}">
                                        <input type="hidden" name="product_qty" value="1">


                                        <div id="card-element" style="margin-bottom: 20px;"></div>
                                        <input type="submit" class="btn btn-success" value="Proceed to Checkout">
                                    </form>-->
                @else
                    <button type="button" class="btn btn-danger pull-right cheackoutbtn" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        Proceed to Checkout
                    </button>
                @endif

            </div>
        </div>
    </div>

@endsection