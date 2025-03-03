<footer class="ps-footer ps-footer--1">
    <div class="ps-footer--top">
        <div class="container">
            <div class="row m-0">
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-wallet"></i>100% Money
                            back</a></p>
                </div>
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i
                                class="icon-bag2"></i>Non-contact shipping</a></p>
                </div>
                <div class="col-12 col-sm-4 p-0">
                    <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-truck"></i>Free
                            delivery for order over $200</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ps-footer__middle">
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="ps-footer--address">
                                <div class="ps-logo"><a href=""> <img src="{{ !empty(optional($setting->first())->site_logo) && file_exists(public_path('storage/' . optional($setting->first())->site_logo)) ? asset('storage/' . optional($setting->first())->site_logo) : asset('frontend/images/no-logo(217-55).jpg') }}" alt><img
                                            class="logo-white" src="" alt><img class="logo-black"
                                            src="" alt><img class="logo-white-all"
                                            src="" alt><img class="logo-green"
                                            src="" alt></a></div>
                                <div class="ps-footer__title">Our store</div>
                                <p>1487 Rocky Horse Carrefour<br>Arlington, TX 16819</p>
                                <p><a target="_blank"
                                        href="">Show
                                        on map</a></p>
                                <ul class="ps-social">
                                    <li><a class="ps-social__link facebook" href="#"><i class="fa fa-facebook">
                                            </i><span class="ps-tooltip">Facebook</span></a></li>
                                    <li><a class="ps-social__link instagram" href="#"><i
                                                class="fa fa-instagram"></i><span
                                                class="ps-tooltip">Instagram</span></a></li>
                                    <li><a class="ps-social__link youtube" href="#"><i
                                                class="fa fa-youtube-play"></i><span
                                                class="ps-tooltip">Youtube</span></a></li>
                                    <li><a class="ps-social__link pinterest" href="#"><i
                                                class="fa fa-pinterest-p"></i><span
                                                class="ps-tooltip">Pinterest</span></a></li>
                                    <li><a class="ps-social__link linkedin" href="#"><i
                                                class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="ps-footer--contact">
                                <h5 class="ps-footer__title">Need help</h5>
                                <div class="ps-footer__fax"><i class="icon-telephone"></i>0020 500 000</div>
                                <p class="ps-footer__work">Monday – Friday: 9:00-20:00<br>Saturday: 11:00 – 15:00</p>
                                <hr>
                                <p><a class="ps-footer__email"
                                        href="">
                                        <i class="icon-envelope"></i><span class="__cf_email__">[email&#160;protected]</span>
                                    </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Information</h5>
                                <ul class="ps-block__list">
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="#">Delivery information</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Sales</a></li>
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Account</h5>
                                <ul class="ps-block__list">
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">My orders</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title">Store</h5>
                                <ul class="ps-block__list">
                                    <li><a href="#">Affiliate</a></li>
                                    <li><a href="#">Bestsellers</a></li>
                                    <li><a href="#">Discount</a></li>
                                    <li><a href="#">Latest products</a></li>
                                    <li><a href="#">Sale</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer--bottom">
            <div class="row">
                <div class="col-12 col-md-6">
                    <p>Copyright © 2025 Ashiquzzaman. All Rights Reserved</p>
                </div>
                <div class="col-12 col-md-6 text-right"><img src="" alt><img class="payment-light"
                        src="" alt></div>
            </div>
        </div>
    </div>
</footer>
