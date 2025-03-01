<header class="ps-header ps-header--1">

    <div class="ps-noti">
        <div class="container">
            <p class="m-0">Due to the <strong>COVID 19 </strong>epidemic, orders may be processed with a slight delay
            </p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>

    <div class="ps-header__top">
        <div class="container">
            <div class="ps-header__text">Need help? <strong>0020 500  - 000</strong></div>
        </div>
    </div>

    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href=""> <img src="" alt><img class="sticky-logo"
                        src="" alt></a></div><a class="ps-menu--sticky" href="#"><i
                    class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="#"><i class="icon-magnifier"></i></a></li>
                    <li><a class="ps-header__item" href="#" id="login-modal"><i class="icon-user"></i></a>
                        <div class="ps-login--modal">
                            <form method="get" action="">
                                <div class="form-group">
                                    <label>Username or Email Address</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password">
                                </div>
                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label>Remember Me</label>
                                </div>
                                <button class="ps-btn ps-btn--warning" type="submit">Log In</button>
                            </form>
                        </div>
                    </li>

                    <li>
                        <a class="ps-header__item" href="{{ route('wishlist.product') }}">
                            <i class="fa fa-heart-o"></i>
                            <span class="badge"  id="cartWishlistQty">0</span> <!-- Initial count is 0 -->
                        </a>
                    </li>

                    <li>
                        <a class="ps-header__item" href="{{route('view.cart')}}" id="cart-link">
                            <i class="icon-cart-empty"></i>
                            <span class="badge" id="cart-count">0</span> <!-- cart count -->
                        </a>
                        

                        {{-- <div class="ps-cart--mini">
                            <ul class="ps-cart__items">

                                <li class="ps-cart__item">
                                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail"
                                            href="product-default.html"><img src="img/products/055.jpg"
                                                alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name"
                                                href="product-default.html">Somersung Sonic X2500 Pro White</a>
                                            <p class="ps-product__meta"> <span class="ps-product__price">$399.99</span>
                                            </p>
                                        </div><a class="ps-product__remove" href="javascript: void(0)"><i
                                                class="icon-cross"></i></a>
                                    </div>
                                </li>

                                <li class="ps-cart__item">
                                    <div class="ps-product--mini-cart"><a class="ps-product__thumbnail"
                                            href="product-default.html"><img src="img/products/001.jpg"
                                                alt="alt" /></a>
                                        <div class="ps-product__content"><a class="ps-product__name"
                                                href="product-default.html">Digital Thermometer X30-Pro</a>
                                            <p class="ps-product__meta"> <span
                                                    class="ps-product__sale">$77.65</span><span
                                                    class="ps-product__is-price">$80.65</span></p>
                                        </div><a class="ps-product__remove" href="javascript: void(0)"><i
                                                class="icon-cross"></i></a>
                                    </div>
                                </li>
                            </ul>

                            <div class="ps-cart__total"><span>Subtotal </span><span>$399</span></div>
                            
                            <div class="ps-cart__footer"><a class="ps-btn ps-btn--outline"
                                    href="shopping-cart.html">View Cart</a><a class="ps-btn ps-btn--warning"
                                    href="checkout.html">Checkout</a></div>
                        </div> --}}
                    </li>
                    
                </ul>

                {{-- <div class="ps-language-currency"><a class="ps-dropdown-value" href="javascript:void(0);"
                        data-toggle="modal" data-target="#popupLanguage">English</a><a class="ps-dropdown-value"
                        href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">USD</a>
                </div> --}}

                <div class="ps-header__search">
                    <form action="https://nouthemes.net/html/mymedi/do_action" method="post">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text"
                                    placeholder="Search for products">
                                <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="ps-search--result">
                        <div class="ps-result__content">
                            <div class="row m-0">
                                <div class="col-12 col-lg-6">
                                    <div class="ps-product ps-product--horizontal">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="#">
                                                <figure><img src="" alt="alt" /></figure>
                                            </a></div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a>3-layer <span
                                                        class='hightlight'>mask</span> with an elastic band (1
                                                    piece)</a></h5>
                                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users
                                                simultaneously Has HEALTH certificate</p>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price">$38.24</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="ps-product ps-product--horizontal">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="#">
                                                <figure><img src="" alt="alt" /></figure>
                                            </a></div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a>3 Layer Disposable Protective Face <span
                                                        class='hightlight'>mask</span>s</a></h5>
                                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users
                                                simultaneously Has HEALTH certificate</p>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$14.52</span><span
                                                    class="ps-product__del">$17.24</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="ps-product ps-product--horizontal">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="#">
                                                <figure><img src="" alt="alt" /></figure>
                                            </a></div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a>3-Ply Ear-Loop Disposable Blue Face <span
                                                        class='hightlight'>mask</span></a></h5>
                                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users
                                                simultaneously Has HEALTH certificate</p>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$14.99</span><span
                                                    class="ps-product__del">$38.24</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="ps-product ps-product--horizontal">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="#">
                                                <figure><img src="" alt="alt" /></figure>
                                            </a></div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a>Disposable Face <span
                                                        class='hightlight'>mask</span> for Unisex</a></h5>
                                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users
                                                simultaneously Has HEALTH certificate</p>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$8.15</span><span
                                                    class="ps-product__del">$12.24</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-result__viewall"><a href="">View all 5 results</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-navigation">
        <div class="container">
            <div class="ps-navigation__left">
                <nav class="ps-main-menu">
                    <ul class="menu">



                        <li class="has-mega-menu"><a href="{{route('frontend.index')}}">Home</a></li>

                        {{-- <li class="has-mega-menu"><a href="#"> Pages<span class="sub-toggle"><i
                                        class="fa fa-chevron-down"></i></span></a>
                            <div class="mega-menu">
                                <div class="container">
                                    <div class="mega-menu__row">
                                        <div class="mega-menu__column">
                                            <h4>Category</h4>
                                            <ul class="sub-menu--mega">
                                                <li><a href="promo-category.html">Promo Category</a></li>
                                                <li><a href="category-grid.html">Grid</a></li>
                                                <li><a href="category-grid-detail.html">Grid with details</a></li>
                                                <li><a href="category-grid-green.html">Grid with header green</a></li>
                                                <li><a href="category-grid-dark.html">Grid with header dark</a></li>
                                                <li><a href="category-grid-separate.html">Grid separate</a></li>
                                                <li><a href="category-list.html">List</a></li>
                                                <li><a href="category-loading-infinity.html">Loading Infinity</a></li>
                                                <li><a href="category-load-more.html">Load more button</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-menu__column">
                                            <h4>Pages</h4>
                                            <ul class="sub-menu--mega">
                                                <li><a href="404.html">404</a></li>
                                                <li><a href="about-us.html">About us</a></li>
                                                <li><a href="contact-us.html">Contact us</a></li>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="portfolio-detail.html">Porfolio Detail</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                <li><a href="coming-soon-v1.html">Coming soon 1</a></li>
                                                <li><a href="coming-soon-v2.html">Coming soon 2</a></li>
                                                <li><a href="product-result.html">Product Result</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-menu__column">
                                            <h4>Product</h4>
                                            <ul class="sub-menu--mega">
                                                <li><a href="product1.html">Layout 01</a></li>
                                                <li><a href="product2.html">Layout 02</a></li>
                                                <li><a href="product3.html">Layout 03</a></li>
                                                <li><a href="product4.html">Layout 04</a></li>
                                                <li><a href="product5.html">Layout 05</a></li>
                                                <li><a href="product6.html">Layout 06</a></li>
                                                <li><a href="product7.html">Layout 07</a></li>
                                                <li><a href="product-variable.html">Product variable</a></li>
                                                <li><a href="product-sold-out.html">Product sold out</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-menu__column">
                                            <h4>Blog</h4>
                                            <ul class="sub-menu--mega">
                                                <li><a href="blog-sidebar1.html">Blog sidebar 1</a></li>
                                                <li><a href="blog-sidebar2.html">Blog sidebar 2</a></li>
                                                <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                                <li><a href="blog-post1.html">Blog post 1</a></li>
                                                <li><a href="blog-post2.html">Blog post 2</a></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li> --}}

                        <li class="has-mega-menu"><a href="">Product</a></li>

                        <li class="has-mega-menu"><a href="">Blog</a></li>

                        <li class="has-mega-menu"><a href="">Contact</a></li>

                    </ul>
                </nav>
            </div>
            <div class="ps-navigation__right">Need help? <strong>0020 500  - 000</strong></div>
        </div>
    </div>
</header>

<header class="ps-header ps-header--1 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0">Due to the <strong>COVID 19 </strong>epidemic, orders may be processed with a slight
                delay</p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="index.html"> <img src="" alt></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
