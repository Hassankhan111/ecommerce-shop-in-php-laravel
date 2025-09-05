@extends('layout.frontend.main')
@section('main-content')

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
                        <li class="active" data-filter="*">All</li>
                           @foreach ($cat as $category)
                                <li data-filter=".cat-{{ $category->cat_id }}">{{ $category->cat_title }}</li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
             <div class="col-lg-3 col-md-4 col-sm-3 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3 mix vegetables fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-3 mix fastfood oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
             <div class="col-lg-3 col-md-4 col-sm-2 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-3 col-md-4 col-sm-2 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-2 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-2 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg"><img src="{{ asset('assets/img/tech/1.jpg') }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Crab Pool Security</a></h6>
                        <h5>$30.00</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest Section End -->

@endsection
