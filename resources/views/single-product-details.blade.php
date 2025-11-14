@extends('layout.frontend.main')
@section('main-content')

    <!-- Breadcrumb Section End -->

    <div class="container my-3">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <nav class="product-tab bg-light p-3 rounded shadow-sm">
                    <ul class="nav align-items-center fw-semibold flex-wrap">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="text-primary text-decoration-none hover-link">Home</a>
                        </li>
                        <span class="text-muted px-2">/</span>
                        <li class="nav-item">
                            <a href="{{ route('category.show', $single_product->Category->cat_id) }}"
                                class="text-dark text-decoration-none hover-link">
                                {{ $single_product->Category->cat_title }}
                            </a>
                        </li>
                        <span class="text-muted px-2">/</span>
                        <li class="nav-item text-secondary text-decoration-none">
                        {{ $single_product->sub_categorie->sub_cat_title }}
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item border border-2 rounded">
                            <img class="product__details__pic__item--large"
                                src="{{ asset('storage/' . $single_product->product_img) }}"
                                alt="{{ asset('storage/' . $single_product->product_img) }}">
                        </div>
                        <div class="product__details__pic__slider owl-carousel border border-2 rounded">
                            @foreach ($subcategory_product as $product_img)
                                <a href="{{ url('productdetails', $product_img->product_id) }}">
                                    <img data-imgbigurl="{{ asset('storage/' . $product_img->product_img) }}"
                                        src="{{ asset('storage/' . $product_img->product_img) }}"
                                        alt="{{ $product_img->product_name }}"></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$single_product->sub_categorie->sub_cat_title}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                            <span> 154 sold</span>
                        </div>
                        <div class="product__details__price">Rs:{{$single_product->product_price}}</div>
                        <p>{{$single_product->product_desc}}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ url('cart', $single_product->product_id) }}" class="primary-btn">ADD TO CARD</a>
                        <a href="{{ url('wishlist', $single_product->product_id) }}" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($subcategory_product as $product_img)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('storage/' . $product_img->product_img) }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{ url('wishlist', $product_img->product_id) }}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ url('productdetails', $product_img->product_id) }}"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="{{ url('cart',$product_img->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a
                                        href="{{ url('productdetails', $product_img->product_id) }}">{{ $product_img->product_desc }}</a>
                                </h6>
                                <h5>RS:{{ $product_img->product_price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

@endsection