<footer class="footer spad">
    <div class="container">
        <div class="row bg-light">
            <div class="col-lg-3 col-md-12 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="/">
                            <img src="{{ asset('storage/' . $seeting_option->site_logo) }}"
                                alt="{{ asset('storage/' . $seeting_option->site_logo) }}" height="50" class="me-2"></a>
                    </div>
                    <ul>
                        <li><b>Address:</b> {{  $seeting_option->contect_address }}</li>
                        <li><b>Phone:</b> {{  $seeting_option->contect_phone }}</li>
                        <li><b>Email: </b>{{  $seeting_option->contect_email }}</li>
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
                    <ul>
                        <h6>CATEGORIES</h6>
                        @foreach ($category as $cat)
                            <li> <a class="text-dark text-decoration-none hover-link"
                                    href="{{ route('category.show', $cat->cat_id) }}">
                                    {{ $cat->cat_title }}
                                </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-6">
                <div class="footer__widget">
                    <ul>
                        <h5><b>USEFULL LINKS</b></h5>
                        <li><a class="text-dark text-decoration-none hover-link" href="#latest-product spad">Home</a></li>
                        <li><a class="text-dark text-decoration-none hover-link" href="#">All Products</a></li>
                        <li><a class="text-dark text-decoration-none hover-link" href="#">Latest Products</a></li>
                        <li><a class="text-dark text-decoration-none hover-link" href="#">Popular Products</a></li>
                        <img src="{{ asset('assets/img/payment-item.png') }}">
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-md-6">
                <div class="footer__widget">
                    <ul>
                        <h6><b>{{$seeting_option->site_name}}</b></h6>
                        <li>{{$seeting_option->site_title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid bg-primary py-3">
        <div class="row text-center align-items-center">
            <div class="col-12">
                <p class="small mb-2 text-light">
                    &copy;
                    <script>document.write(new Date().getFullYear());</script>
                    <strong>Mohammad Imran</strong> | <i class="fa fa-heart text-danger" aria-hidden="true"></i> by
                    <a href="/" target="_blank" class="text-light text-decoration-none hover-link">
                        {{ $seeting_option->footer_text }}
                    </a>
                </p>
                <img src="{{ asset('assets/img/payment-item.png') }}" alt="Payment Methods" class="img-fluid mt-2"
                    style="max-height: 40px;">
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