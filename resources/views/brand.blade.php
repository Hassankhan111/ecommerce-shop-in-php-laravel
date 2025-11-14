@extends('layout.frontend.main')
@section('main-content')

    <!-- latest products section -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>All Brands</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*"> ALL BRANDS</li>
                            @foreach ($br as $b)
                                <li class="brandli"><a
                                        href="{{ route('brand.show', $b->brand_id) }}">{{ $b->brand_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @forelse ($brand as $prodct)
                    <div class="col-lg-3 col-md-4 col-sm-3 mix vegetables fastfood">
                        <div class="featured__item">
                           <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('storage/' . $prodct->product_img) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{$prodct->product_desc}}"></a></h6>
                                <h5>Rs:{{$prodct->product_price}}</h5>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="alert alert-danger" role="alert">
                        <p>No products found for this brand.</p>
                    </div>

                @endforelse
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Brands Products</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">BRANDS</li>
                            @foreach ($br as $b)
                                <li class="brandli"><a
                                        href="{{ route('brand.show', $b->brand_id) }}">{{ $b->brand_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
             @forelse ($brand as $prodct)
                <div class="col-lg-3 col-md-4 col-sm-2 mix oranges fastfood">
                    <div class="featured__item">
                        @if (file_exists(storage_path('app/public/' . $prodct->product_img)))
                          <div class="featured__item__pic set-bg"><img src="{{ asset('storage/' . $prodct->product_img) }}" alt="{{ $prodct->product_title }}">
                        @else
                          <img src="{{ asset('images/no-image.png') }}" alt="No image">
                        @endif
                         <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"></a>{{$prodct->product_desc}}</h6>
                            <h5>Rs:{{$prodct->product_price}}</h5>
                        </div>
                    </div>
                </div>
                  @empty
                    <div class="alert alert-danger" role="alert">
                        <p>No products found for this brand.</p>
                    </div>

                @endforelse
            </div>
        </div>
    </section>
    <!-- latest Section End -->

@endsection