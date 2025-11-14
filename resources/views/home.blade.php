@extends('layout.frontend.main')

@section('main-content')

    <!-- category fetch and banner section-->
    <section class="hero m-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categories</span>
                        </div>
                        <ul>
                            @foreach ($category as $cat)
                                <li><a class="dropdown-item"
                                        href="{{ route('category.show', $cat->cat_id) }}">{{ $cat->cat_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <a href="#"><img src="{{ asset('assets/img/banner3.jpg') }}" style="width:1200px;"></a>
                </div>
            </div>
    </section>
    <!-- category end banner section end-->

    <!-- fetch brand and brand products -->
    <section class="categories">
        <div class="container">
            <div class="row bg-light">
                <div class="col-lg-3 col-mb-4">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Brands</span>
                        </div>
                        <ul>
                            @foreach ($brand as $brands)
                                <li><a class="dropdown-item"
                                        href="{{ route('brand.show', $brands->brand_id) }}">{{ $brands->brand_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="categories__slider owl-carousel">
                            <div class="col-lg-3">
                                <div class="categories__item set-bg"><img src="{{ asset('assets/img/tech/3.jpg') }}"
                                        style="height:80%;">
                                    <h5><a href="#">Nokei</a></h5>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg"><img src="{{ asset('assets/img/tech/4.jpg') }}"
                                        style="height:80%;">
                                    <h5><a href="#">Qmobile</a></h5>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg"><img src="{{ asset('assets/img/tech/5.jpg') }}"
                                        style="height:80%;">
                                    <h5><a href="#">Infinix</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brands Section End -->

    <!-- latest products section -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            @foreach ($category as $cat)
                                <li class="brandli"> <a
                                        href="{{ route('category.show', $cat->cat_id) }}">{{ $cat->cat_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-3">
                    <!-- Rating Filter -->
                    <div class="rating-filter border rounded shadow-sm p-3 bg-white mt-4">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Price range</span>
                        </div>
                        <!-- Price Range Filter -->
                        <div style="margin:15px;">
                            <input type="range" class="form-range" min="0" max="5" id="range2">
                        </div>
                        <div class="price-filter border rounded shadow-sm p-3 bg-white mt-4">
                            <h5 class="fw-bold mb-3">Filter by Price</h5>
                            <form>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="number" class="form-control" placeholder="Min $" min="0">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control" placeholder="Max $" min="0">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-3">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
                @foreach ($sub_cat_products as $products)
                    <div class="col-lg-3 col-md-4 col-sm-2 mix oranges fastfood">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"><a
                                    href="{{ url('productdetails', $products->product_id) }}">
                                    <img src="{{ asset('storage/' . $products->product_img) }}"></a>
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ url('productdetails', $products->product_id) }}"><i
                                                class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a
                                        href="{{ url('productdetails', $products->product_id) }}">{{ $products->product_desc }}</a>
                                </h6>
                                <h5>RS:{{ $products->product_price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- latest Section End -->

    <!-- future products -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            @foreach ($category as $cat)
                                <li class="brandli"> <a
                                        href="{{ route('category.show', $cat->cat_id) }}">{{ $cat->cat_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class=" row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Futue Product</span>
                        </div>
                        <div class="featured__controls">
                            <ul>
                                @foreach ($category as $cat)
                                    <li class="brandli"> <a
                                            href="{{ route('category.show', $cat->cat_id) }}">{{ $cat->cat_title }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                @foreach ($sub_cat_products as $products)
                    <div class="col-lg-3 col-md-4 col-sm-3 mix vegetables fastfood">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"><a
                                    href="{{ url('productdetails', $products->product_id) }}">
                                    <img src="{{ asset('storage/' . $products->product_img) }}"></a>
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="{{ url('productdetails', $products->product_id) }}"><i
                                                class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a
                                        href="{{ url('productdetails', $products->product_id) }}">{{ $products->product_desc }}</a>
                                </h6>
                                <h5>RS:{{ $products->product_price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- future products End -->

    <!-- all product Section Begin -->
    <section class="#latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($sub_cat_products as $product)
                                <div class="latest-product__slider__item">
                                    <a href="{{ url('productdetails', $product->product_id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/' . $product->product_img) }}"
                                                alt="{{ $product->product_desc }}">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->product_desc }}</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($sub_cat_products as $product)
                                <div class="latest-product__slider__item">
                                    <a href="{{ url('productdetails', $product->product_id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/' . $product->product_img) }}"
                                                alt="{{ $product->product_desc }}">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->product_desc }}</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($sub_cat_products as $product)
                                <div class="latest-product__slider__item">
                                    <a href="{{ url('productdetails', $product->product_id) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('storage/' . $product->product_img) }}"
                                                alt="{{ $product->product_desc }}">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->product_desc }}</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- all product Product Section End -->



    <!-- Pagination Start -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center m-4">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    <!-- Pagination End -->


    <!--pagination- end-->
    <!-- Blog Section Begin -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center bg-light p-5 rounded shadow-sm">
                <div class="footer__widget">
                    <h4 class="mb-3 text-dark">📩 Subscribe to our Newsletter</h4>
                    <p class="text-muted">
                        Get email updates about our latest shop arrivals and special offers.
                    </p>

                    <form action="#" class="d-flex flex-column flex-sm-row justify-content-center mt-3">
                        <input type="email" class="form-control me-sm-2 mb-2 mb-sm-0 rounded-pill"
                            placeholder="Enter your email" required>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill shadow-sm">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Section End -->

@endsection