<!DOCTYPE html>
<html lang="en">


@include('frontend.partials.head')

<body>

    <div class="ps-page">

        @include('frontend.partials.header')


        <div class="ps-home ps-home--1">

            @yield('forntend')

        </div>

        @include('frontend.partials.footer')

    </div>

    <div class="ps-search">
        <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i
                    class="icon-cross"></i></a>
            <h3>Search</h3>
            <form action="" method="post">
                <div class="ps-search-table">
                    <div class="input-group">
                        <input class="form-control ps-input" type="text" placeholder="Search for products">
                        <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                    </div>
                </div>
            </form>
            <div class="ps-search__result">
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-layer <span class='hightlight'>mask</span> with an
                                    elastic band (1 piece)</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price">$38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3 Layer Disposable Protective Face <span
                                        class='hightlight'>mask</span>s</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$14.52</span><span
                                    class="ps-product__del">$17.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-Ply Ear-Loop Disposable Blue Face <span
                                        class='hightlight'>mask</span></a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$14.99</span><span
                                    class="ps-product__del">$38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>Disposable Face <span class='hightlight'>mask</span> for
                                    Unisex</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has
                                HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$8.15</span><span
                                    class="ps-product__del">$12.24</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-navigation--footer">
        <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#"
                id="close-menu"><i class="icon-cross"></i></a></div>
        <div class="ps-nav__item"><a href=""><i class="icon-home2"></i></a></div>
        <div class="ps-nav__item"><a href=""><i class="icon-user"></i></a></div>
        <div class="ps-nav__item"><a href=""><i class="fa fa-heart-o"></i><span class="badge">3</span></a>
        </div>
        <div class="ps-nav__item"><a href="shopping-cart.html"><i class="icon-cart-empty"></i><span
                    class="badge">2</span></a></div>
    </div>

    {{-- Mobile Menu  --}}
    <div class="ps-menu--slidebar">
        <div class="ps-menu__content">
            <ul class="menu--mobile">
                <li class="menu-item-has-children"><a href="#">Products</a><span class="sub-toggle"><i
                            class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">Wound Care</a><span class="sub-toggle"><i
                                    class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="category-list.html">Bandages</a></li>
                                <li><a href="category-list.html">Gypsum foundations</a></li>
                                <li><a href="category-list.html">Patches and tapes</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Higiene</a><span class="sub-toggle"><i
                                    class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="category-list.html">Disposable products</a></li>
                                <li><a href="category-list.html">Face masks</a></li>
                                <li><a href="category-list.html">Gloves</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Laboratory</a><span class="sub-toggle"><i
                                    class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="category-list.html">Devices</a></li>
                                <li><a href="category-list.html">Diagnostic tests</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Home Medical Supplies</a><span
                        class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="category-list.html">Diagnosis</a></li>
                        <li><a href="category-list.html">Accessories Tools</a></li>
                        <li><a href="category-list.html">Bandages</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Homepages</a><span class="sub-toggle"><i
                            class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="index.html">Home 01</a></li>
                        <li><a href="home2.html">Home 02</a></li>
                        <li><a href="home3.html">Home 03</a></li>
                        <li><a href="home4.html">Home 04</a></li>
                        <li><a href="home5.html">Home 05</a></li>
                        <li><a href="home6.html">Home 06</a></li>
                        <li><a href="home7.html">Home 07</a></li>
                        <li><a href="home8.html">Home 08</a></li>
                        <li><a href="home9.html">Home 09</a></li>
                        <li><a href="home10.html">Home 10</a></li>
                        <li><a href="home11.html">Home 11</a></li>
                        <li><a href="home12.html">Home 12</a></li>
                        <li><a href="home13.html">Home 13</a></li>
                        <li><a href="home14.html">Home 14</a></li>
                        <li><a href="home15.html">Home 15</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="category-list.html">Shop</a></li>
                <li class="menu-item-has-children"><a href="#">Pages</a><span class="sub-toggle"><i
                            class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">Category</a><span class="sub-toggle"><i
                                    class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="category-grid.html">Grid</a></li>
                                <li><a href="category-grid-detail.html">Grid with details</a></li>
                                <li><a href="category-grid-green.html">Grid with header green</a></li>
                                <li><a href="category-grid-dark.html">Grid with header dark</a></li>
                                <li><a href="category-grid-separate.html">Grid separate</a></li>
                                <li><a href="category-list.html">List</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Product</a><span class="sub-toggle"><i
                                    class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="product1.html">Layout 01</a></li>
                                <li><a href="product2.html">Layout 02</a></li>
                                <li><a href="product3.html">Layout 03</a></li>
                                <li><a href="product4.html">Layout 04</a></li>
                                <li><a href="product5.html">Layout 05</a></li>
                                <li><a href="product6.html">Layout 06</a></li>
                                <li><a href="product7.html">Layout 07</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a><span class="sub-toggle"><i
                                    class="fa fa-chevron-down"></i></span>
                            <ul class="sub-menu">
                                <li><a href="404.html">404</a></li>
                                <li><a href="about-us.html">About us</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="coming-soon-v1.html">Coming soon 1</a></li>
                                <li><a href="coming-soon-v2.html">Coming soon 2</a></li>
                                <li><a href="blog-post1.html">Blog post 1</a></li>
                                <li><a href="blog-post2.html">Blog post 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Collection</a><span class="sub-toggle"><i
                            class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="category-list.html">Face masks</a></li>
                        <li><a href="category-list.html">Dental</a></li>
                        <li><a href="category-list.html">Micrscope</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="blog-sidebar1.html">Blog</a></li>
                <li class="menu-item-has-children"><a href="contact-us.html">Contact</a></li>
            </ul>
        </div>
        <div class="ps-menu__footer">
            <div class="ps-menu__item">
                <ul class="ps-language-currency">
                    <li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i
                                class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="#">Français</a></li>
                            <li><a href="#">Deutsch</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">USD</a><span class="sub-toggle"><i
                                class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">EUR</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="ps-menu__item">
                <div class="ps-menu__contact">Need help? <strong>0020 500 - 000</strong></div>
            </div>
        </div>
    </div>

    <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>

    <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div>

    <div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-quickview__body">
                        <button class="close ps-quickview__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-product--detail">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product--gallery">
                                        <div class="ps-product__thumbnail">
                                            <div class="slide"><img src="" alt="alt" />
                                            </div>
                                            <div class="slide"><img src="" alt="alt" />
                                            </div>
                                            <div class="slide"><img src="" alt="alt" />
                                            </div>
                                            <div class="slide"><img src="" alt="alt" />
                                            </div>
                                            <div class="slide"><img src="" alt="alt" />
                                            </div>
                                        </div>
                                        <div class="ps-gallery--image">
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src=""
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src=""
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src=""
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src=""
                                                        alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src=""
                                                        alt="alt" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product__info">
                                        <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN
                                                STOCK</span>
                                        </div>
                                        <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                        <div class="ps-product__title"><a href="#">Blood Pressure Monitor</a>
                                        </div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">(5 Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="d-md-flex align-items-center">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity"
                                                        value="1" type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div><a class="ps-btn ps-btn--warning" href="#"
                                                    data-toggle="modal" data-target="#popupAddcartV2">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">
                                                <li> <span class="ps-list__title">Tags: </span><a
                                                        class="ps-list__text" href="#">Health</a><a
                                                        class="ps-list__text" href="#">Thermometer</a>
                                                </li>
                                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text"
                                                        href="#">SF-006</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="modal fade" id="popupLanguage" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ps-popup--select">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid">
                        <button class="close ps-popup__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-popup__body">
                            <h2 class="ps-popup__title">Select language</h2>
                            <ul class="ps-popup__list">
                                <li class="language-item"> <a class="active btn" href="javascript:void(0);"
                                        data-value="English">English</a></li>
                                <li class="language-item"> <a class="btn" href="javascript:void(0);"
                                        data-value="Deutsch">Deutsch</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="modal fade" id="popupCurrency" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ps-popup--select">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid">
                        <button class="close ps-popup__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-popup__body">
                            <h2 class="ps-popup__title">Select currency</h2>
                            <ul class="ps-popup__list">
                                <li class="currency-item"> <a class="active btn" href="javascript:void(0);"
                                        data-value="USD">USD</a></li>
                                <li class="currency-item"> <a class="btn" href="javascript:void(0);"
                                        data-value="EUR">EUR</a></li>
                                <li class="currency-item"> <a class="btn" href="javascript:void(0);"
                                        data-value="JPY">JPY</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}




    @include('frontend.partials.scripts')

</body>

</html>
