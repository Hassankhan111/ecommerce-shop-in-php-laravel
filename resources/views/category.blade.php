@extends('layout.frontend.main')
@section('main-content')

<!-- latest products section -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $cat->cat_title }}</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">BRANDS</li>
                           @foreach ($brand as $brands)
                                <li class="brandli"><a href="{{ route('brand.show' ,$brands->brand_id) }}">{{ $brands->brand_name }}</li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($cat->product as $products)
             <div class="col-lg-3 col-md-4 col-sm-3 mix vegetables fastfood">
                <div class="featured__item">
                     <div class="featured__item__pic set-bg"><a href="{{ url('productdetails',$products->product_id) }}">
                        <img src="{{ asset('storage/' . $products->product_img) }}"></a>
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$products->product_desc}}</a></h6>
                        <h5>Rs:{{$products->product_price}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container">
         <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
                <div class="featured__controls">
                     <ul>
                        <li class="active" data-filter="*">BRANDS</li>
                           @foreach ($brand as $brands)
                                <li class="brandli"><a href="{{ route('brand.show' ,$brands->brand_id) }}">{{ $brands->brand_name }}</li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($related_products as $prodct)
             <div class="col-lg-3 col-md-4 col-sm-2 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><a href="{{ url('productdetails',$prodct->product_id) }}">
                        <img src="{{ asset('storage/' . $prodct->product_img) }}"></a>
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="">{{$prodct->product_desc}}</a></h6>
                        <h5>Rs:{{$prodct->product_price}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- latest Section End -->

@endsection
