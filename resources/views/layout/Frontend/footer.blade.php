<footer class="footer spad">
    <div class="container">
        <div class="row bg-light">
            <div class="col-lg-3 col-md-12 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="/"><img src="{{ (!empty($seeting_option) && !empty($seeting_option->site_logo))
    ? asset('storage/' . $seeting_option->site_logo)
    : asset('images/logo.png') }}" alt="Site Logo" height="50" class="me-2">
                        </a>

                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <strong>Address:</strong>
                            {{ $seeting_option->contect_address ?? '123 Main Street, City' }}
                        </li>

                        <li>
                            <strong>Phone:</strong>
                            {{ $seeting_option->contect_phone ?? '+1 234 567 890' }}
                        </li>

                        <li>
                            <strong>Email:</strong>
                            {{ $seeting_option->contect_email ?? 'info@example.com' }}
                        </li>
                    </ul>
                </div>
                <div class="footer__widget">
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-6">
                <div class="footer__widget">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <h6 class="fw-bold text-uppercase">Categories</h6>
                        </li>

                        @forelse($category as $cat)
                            <li class="mb-1">
                                <a href="{{ route('category.show', $cat->cat_id) }}" class="text-dark text-decoration-none">
                                    {{ $cat->cat_title }}
                                </a>
                            </li>
                        @empty
                            <li><a href="#" class="text-dark text-decoration-none">Electronics</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Mobile Phones</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Fashion</a></li>
                            <li><a href="#" class="text-dark text-decoration-none">Home & Kitchen</a></li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="footer__widget">

                    <h5 class="fw-bold mb-3 text-uppercase">Useful Links</h5>

                    <ul class="list-unstyled">

                        <li class="mb-2">
                            <a href="{{ route('home') }}" class="text-dark text-decoration-none">
                                <i class="fa fa-angle-right me-2"></i>Home
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('home') }}" class="text-dark text-decoration-none">
                                <i class="fa fa-angle-right me-2"></i>All Products
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="#latest-product" class="text-dark text-decoration-none">
                                <i class="fa fa-angle-right me-2"></i>Latest Products
                            </a>
                        </li>

                        <li class="mb-3">
                            <a href="#popular-product" class="text-dark text-decoration-none">
                                <i class="fa fa-angle-right me-2"></i>Popular Products
                            </a>
                        </li>

                    </ul>

                    <img src="{{ asset('assets/img/payment-item.png') }}" alt="Payment Methods" class="img-fluid mt-2">

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="footer__widget">

                    <h5 class="fw-bold text-uppercase mb-3">
                        {{ optional($seeting_option)->site_name ?? 'My Store' }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ optional($seeting_option)->site_title ?? 'Your trusted online shopping destination with quality products at affordable prices.' }}
                    </p>

                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid bg-primary text-white py-4">
        <div class="container">

            <div class="row align-items-center text-center text-lg-start">

                <!-- Copyright -->
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <small>
                        &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        <strong>{{ optional($seeting_option)->site_name ?? 'My Store' }}</strong>.
                        All Rights Reserved.
                    </small>
                    <br>

                    <small>
                        Developed with
                        <i class="fa fa-heart text-danger mx-1"></i>
                        by
                        <a href="/" class="text-white text-decoration-none fw-semibold">
                            {{ optional($seeting_option)->footer_text ?? 'Mohammad Imran' }}
                        </a>
                    </small>
                </div>

                <!-- Payment Methods -->
                <div class="col-lg-6 text-center text-lg-end">
                    <img src="{{ asset('assets/img/payment-item.png') }}" alt="Payment Methods" class="img-fluid"
                        style="max-height:40px;">
                </div>

            </div>

        </div>
    </div>

</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- Custom JS-->
<script src="{{ asset('assets/frontend/custom.js')}}"></script>



</body>

</html>