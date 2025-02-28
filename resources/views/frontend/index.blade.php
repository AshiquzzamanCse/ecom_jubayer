@extends('frontend.dashboard')
@section('forntend')


    {{-- Banner Section  Start --}}
    @include('frontend.pages.homepage.banner')
    {{-- Banner Section End  --}}

    <div class="ps-home__content">

        {{-- Category Section Start --}}
        @include('frontend.pages.homepage.category')
        {{-- Category Section End --}}

        {{-- Latest Product Start  --}}
        @include('frontend.pages.homepage.latest_product')
        {{-- Latest Product Start  --}}

        <div class="container">

            <div class="ps-delivery" data-background="{{ asset('frontend/assets/img/promotion/banner-delivery-2.jpg') }}">
                <div class="ps-delivery__content">
                    <div class="ps-delivery__text"> <i class="icon-shield-check"></i><span> <strong>100% Secure delivery
                            </strong>without contacting the courier</span></div><a class="ps-delivery__more"
                        href="#">More</a>
                </div>
            </div>

            @if ($hot_deal_products->isNotEmpty())
                <section class="ps-section--deals">
                    <div class="ps-section__header">
                        <h3 class="ps-section__title">Best Deals of the Week!</h3>
                    </div>
                    <div class="ps-section__carousel">
                        <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                            data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2"
                            data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5"
                            data-owl-duration="1000" data-owl-mousedrag="on">


                            @foreach ($hot_deal_products as $hot_deal_product)
                                @if ($hot_deal_product->image)
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">

                                            <div class="ps-product__thumbnail">


                                                <a class="ps-product__image" href=""
                                                    style="width: 100%;height: 200px;">
                                                    <figure>
                                                        <img src="{{ !empty($hot_deal_product->image) ? url('storage/' . $hot_deal_product->image) : 'https://ui-avatars.com/api/?name=' . urlencode($hot_deal_product->name) }}"
                                                            alt="alt" />

                                                        <img src="{{ !empty($hot_deal_product->image) ? url('storage/' . $hot_deal_product->image) : 'https://ui-avatars.com/api/?name=' . urlencode($hot_deal_product->name) }}"
                                                            alt="alt" />

                                                    </figure>
                                                </a>

                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist"><a href="#"><i
                                                                class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a href="#"
                                                            data-toggle="modal" data-target="#popupCompare"><i
                                                                class="fa fa-align-left"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Quick view"><a href="#"
                                                            data-toggle="modal" data-target="#popupQuickview"><i
                                                                class="fa fa-search"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"
                                                            data-toggle="modal" data-target="#popupAddcart"><i
                                                                class="fa fa-shopping-basket"></i></a>
                                                    </div>
                                                </div>



                                                <div class="ps-product__badge"></div>

                                                @if ($hot_deal_product->discount_price == null)
                                                    {{-- <span class="badge rounded-pill bg-dark">No Discount</span> --}}
                                                @else
                                                    @php
                                                        $amount =
                                                            $hot_deal_product->selling_price -
                                                            $hot_deal_product->discount_price;
                                                        $discount = ($amount / $hot_deal_product->selling_price) * 100;
                                                    @endphp
                                                    <div class="ps-product__badge">
                                                        <div class="ps-badge ps-badge--hot">{{ round($discount) }}%</div>
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="ps-product__content">

                                                <p class="mb-0">{{ optional($hot_deal_product->category)->name }}</p>
                                                <h5 class=""><a href=""></a>{{ $hot_deal_product->name }}
                                                </h5>

                                                <div class="ps-product__meta">

                                                    <span class="ps-product__price sale">Tk
                                                        {{ $hot_deal_product->selling_price }}</span>
                                                    @if ($hot_deal_product->discount_price == null)
                                                    @else
                                                        <span class="ps-product__del">Tk
                                                            {{ $hot_deal_product->discount_price }}</span>
                                                    @endif
                                                </div>

                                                {{-- <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select><span class="ps-product__review">( Reviews)</span>
                                                </div> --}}



                                                <div class="ps-product__actions ps-product__group-mobile">
                                                    <div class="ps-product__quantity">
                                                        <div class="def-number-input number-input safari_only">
                                                            <button class="minus"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                    class="icon-minus"></i></button>
                                                            <input class="quantity" min="0" name="quantity"
                                                                value="1" type="number" />
                                                            <button class="plus"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                    class="icon-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                            href="#" data-toggle="modal"
                                                            data-target="#popupAddcart">Add to
                                                            cart</a></div>
                                                    <div class="ps-product__item cart" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="#"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    <div class="ps-product__item rotate" data-toggle="tooltip"
                                                        data-placement="left" title="Add to compare"><a
                                                            href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </section>
            @endif


            {{-- <section class="ps-section--sellers">
                <h3 class="ps-section__title">Top 5 Bestsellers in: </h3>
                <div class="ps-section__tab">
                    <ul class="nav nav-tabs" id="bestsellerTab" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" id="blood-tab"
                                data-toggle="tab" href="#blood" role="tab" aria-controls="blood"
                                aria-selected="true">Blood pressure</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" id="mask-tab" data-toggle="tab"
                                href="#mask" role="tab" aria-controls="mask" aria-selected="false">Face masks</a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" id="stomatology-tab"
                                data-toggle="tab" href="#stomatology" role="tab" aria-controls="stomatology"
                                aria-selected="false">Stomatology</a></li>
                    </ul>
                    <div class="tab-content" id="bestsellerTabContent">
                        <div class="tab-pane fade show active" id="blood" role="tabpanel"
                            aria-labelledby="blood-tab">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/001.jpg" alt="alt" /><img
                                                        src="img/products/009.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Quick view"><a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview"><i class="fa fa-search"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#" data-toggle="modal"
                                                        data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Sold Out</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer
                                                    X30-Pro</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$77.65</span><span
                                                    class="ps-product__del">$80.65</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/003.jpg" alt="alt" /><img
                                                        src="img/products/008.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Quick view"><a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview"><i class="fa fa-search"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#" data-toggle="modal"
                                                        data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sale">Sale</div>
                                                <div class="ps-badge ps-badge--hot">Hot</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Automatic blood
                                                    pressure monitor</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$90.65</span><span
                                                    class="ps-product__del">$60.65</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/008.jpg" alt="alt" /><img
                                                        src="img/products/003.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Quick view"><a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview"><i class="fa fa-search"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#" data-toggle="modal"
                                                        data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Home Blood Pressure
                                                    Monitors</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$90.65</span><span
                                                    class="ps-product__del">$60.65</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/009.jpg" alt="alt" /><img
                                                        src="img/products/001.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Quick view"><a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview"><i class="fa fa-search"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#" data-toggle="modal"
                                                        data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Blood Pressure Monitor
                                                    with Stroke Risk Detection</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$77.65</span><span
                                                    class="ps-product__del">$80.65</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/028.jpg" alt="alt" /><img
                                                        src="img/products/045.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Quick view"><a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview"><i class="fa fa-search"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#" data-toggle="modal"
                                                        data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Sold Out</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer
                                                    X30-Pro</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$60.39</span><span
                                                    class="ps-product__del">$89.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/049.jpg" alt="alt" /><img
                                                        src="img/products/048.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Quick view"><a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview"><i class="fa fa-search"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#" data-toggle="modal"
                                                        data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sale">Sale</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Technical Classicpod
                                                    Micro Stethoscope Case</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$38.24 -
                                                    $60.39</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mask" role="tabpanel" aria-labelledby="mask-tab">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/006.jpg" alt="alt" /><img
                                                        src="img/products/052.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Quick view"><a href="#" data-toggle="modal"
                                                        data-target="#popupQuickview"><i class="fa fa-search"></i></a>
                                                </div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Add to cart"><a href="#" data-toggle="modal"
                                                        data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sale">Sale</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Protectiva Soft
                                                    absorbent pads, 30 pcs.</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$38.39</span><span
                                                    class="ps-product__del">$35.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/051.jpg" alt="alt" /><img
                                                        src="img/products/052.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Sold Out</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">3-Ply Ear-Loop
                                                    Disposable Blue Face Mask</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$32.39</span><span
                                                    class="ps-product__del">$14.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/050.jpg" alt="alt" /><img
                                                        src="img/products/052.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Disposable Face Mask
                                                    for Unisex</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$20.39</span><span
                                                    class="ps-product__del">$8.15</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/033.jpg" alt="alt" /><img
                                                        src="img/products/052.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Sold Out</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">3 Layer Disposable
                                                    Protective Face Masks</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$15.52</span><span
                                                    class="ps-product__del">$14.52</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/052.jpg" alt="alt" /><img
                                                        src="img/products/051.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sale">Sale</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">3-layer mask with an
                                                    elastic band (1 piece)</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$38.24</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2" selected="selected">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/051.jpg" alt="alt" /><img
                                                        src="img/products/052.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sale">Sale</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">3-Ply Ear-Loop
                                                    Disposable Blue Face Mask</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$32.84</span><span
                                                    class="ps-product__del">$14.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2" selected="selected">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="stomatology" role="tabpanel"
                            aria-labelledby="stomatology-tab">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true"
                                data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                                data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                                data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000"
                                data-owl-mousedrag="on">
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/054.jpg" alt="alt" /><img
                                                        src="img/products/057.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--hot">Hot</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic X2000
                                                    Pro Black</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$299.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/053.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic X500
                                                    Basic</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$38.39</span><span
                                                    class="ps-product__del">$53.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/055.jpg" alt="alt" /><img
                                                        src="img/products/056.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic X2500
                                                    Pro White</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$39.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/042.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Extractor used to
                                                    remove teeth</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$53.64</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/010.jpg" alt="alt" /><img
                                                        src="img/products/011.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Hill-Rom P8000
                                                    Stretcher</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$511.64</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/013.jpg" alt="alt" /><img
                                                        src="img/products/012.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="#"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a href="#"
                                                        data-toggle="modal" data-target="#popupCompare"><i
                                                            class="fa fa-align-left"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"
                                                        data-toggle="modal" data-target="#popupAddcart"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Hill-Rom VersaCare</a>
                                            </h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$136.87</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">( Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                            <div class="ps-product__actions ps-product__group-mobile">
                                                <div class="ps-product__quantity">
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity"
                                                            value="1" type="number" />
                                                        <button class="plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                class="icon-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                        href="#" data-toggle="modal"
                                                        data-target="#popupAddcart">Add to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}


            {{-- Middle Banner Start --}}
            <div class="ps-promo">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="ps-promo__item"><img class="ps-promo__banner"
                                src="{{ asset('frontend/assets/img/promotion/bg-banner4.jpg') }}" alt="alt" />
                            <div class="ps-promo__content">{{ optional($homepage)->homepage_banner_one_badge }}</span>
                                <h4 class="mb-20 ps-promo__name">{{ optional($homepage)->homepage_banner_one_title }}
                                </h4><a class="ps-promo__btn"
                                    href="{{ optional($homepage)->homepage_banner_one_url }}">See More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="ps-promo__item"><img class="ps-promo__banner"
                                src="{{ asset('frontend/assets/img/promotion/bg-banner5.jpg') }}" alt="alt" />
                            <div class="ps-promo__content">
                                <h4 class="ps-promo__name">{{ optional($homepage)->homepage_banner_two_title }}</h4>
                                <div class="ps-promo__sale">{{ optional($homepage)->homepage_banner_two_badge }}</div><a
                                    class="ps-promo__btn" href="{{ optional($homepage)->homepage_banner_two_url }}">Shop
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Middle Banner End --}}


            {{-- Featured Product Start  --}}
            @if ($featured_products->isNotEmpty())
                <section class="ps-section--featured">
                    <h3 class="ps-section__title">Featured Products</h3>
                    <div class="ps-section__content">

                        <div class="row m-0">

                            @foreach ($featured_products as $featured_product)
                                @if ($featured_product->image)
                                    <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                        <div class="ps-section__product">
                                            <div class="ps-product ps-product--standard">
                                                <div class="ps-product__thumbnail">

                                                    <a class="ps-product__image" href=""
                                                        style="width: 100%;height: 200px;">
                                                        <figure>
                                                            <img src="{{ !empty($featured_product->image) ? url('storage/' . $featured_product->image) : 'https://ui-avatars.com/api/?name=' . urlencode($featured_product->name) }}"
                                                                alt="alt" />

                                                            <img src="{{ !empty($featured_product->image) ? url('storage/' . $featured_product->image) : 'https://ui-avatars.com/api/?name=' . urlencode($featured_product->name) }}"
                                                                alt="alt" />

                                                        </figure>
                                                    </a>


                                                    <div class="ps-product__actions">
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist"><a href="#"><i
                                                                    class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        <div class="ps-product__item rotate" data-toggle="tooltip"
                                                            data-placement="left" title="Add to compare"><a
                                                                href="#" data-toggle="modal"
                                                                data-target="#popupCompare"><i
                                                                    class="fa fa-align-left"></i></a></div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Quick view"><a href="#"
                                                                data-toggle="modal" data-target="#popupQuickview"><i
                                                                    class="fa fa-search"></i></a></div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a href="#"
                                                                data-toggle="modal" data-target="#popupAddcart"><i
                                                                    class="fa fa-shopping-basket"></i></a></div>
                                                    </div>

                                                    @if ($featured_product->discount_price == null)
                                                        {{-- <span class="badge rounded-pill bg-dark">No Discount</span> --}}
                                                    @else
                                                        @php
                                                            $amount =
                                                                $featured_product->selling_price -
                                                                $featured_product->discount_price;
                                                            $discount =
                                                                ($amount / $featured_product->selling_price) * 100;
                                                        @endphp
                                                        <div class="ps-product__badge">
                                                            <div class="ps-badge ps-badge--hot">{{ round($discount) }}%
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="ps-product__content">
                                                    <p class="mb-0">{{ optional($featured_product->category)->name }}
                                                    </p>
                                                    <h5 class=""><a
                                                            href="">{{ $featured_product->name }}</a></h5>


                                                    <div class="ps-product__meta">

                                                        <span class="ps-product__price sale">Tk
                                                            {{ $featured_product->selling_price }}</span>
                                                        @if ($featured_product->discount_price == null)
                                                        @else
                                                            <span class="ps-product__del">Tk
                                                                {{ $featured_product->discount_price }}</span>
                                                        @endif
                                                    </div>

                                                    {{-- <div class="ps-product__rating">
                                                        <select class="ps-rating" data-read-only="true">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4" selected="selected">4</option>
                                                            <option value="5">5</option>
                                                        </select><span class="ps-product__review">( Reviews)</span>
                                                    </div> --}}

                                                    <div class="ps-product__desc">
                                                        <ul class="ps-product__list">
                                                            <li>Study history up to 30 days</li>
                                                            <li>Up to 5 users simultaneously</li>
                                                            <li>Has HEALTH certificate</li>
                                                        </ul>
                                                    </div>
                                                    <div class="ps-product__actions ps-product__group-mobile">
                                                        <div class="ps-product__quantity">
                                                            <div class="def-number-input number-input safari_only">
                                                                <button class="minus"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                                        class="icon-minus"></i></button>
                                                                <input class="quantity" min="0" name="quantity"
                                                                    value="1" type="number" />
                                                                <button class="plus"
                                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                                        class="icon-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning"
                                                                href="#" data-toggle="modal"
                                                                data-target="#popupAddcart">Add
                                                                to cart</a></div>
                                                        <div class="ps-product__item cart" data-toggle="tooltip"
                                                            data-placement="left" title="Add to cart"><a
                                                                href="#"><i class="fa fa-shopping-basket"></i></a>
                                                        </div>
                                                        <div class="ps-product__item" data-toggle="tooltip"
                                                            data-placement="left" title="Wishlist"><a
                                                                href="wishlist.html"><i class="fa fa-heart-o"></i></a>
                                                        </div>
                                                        <div class="ps-product__item rotate" data-toggle="tooltip"
                                                            data-placement="left" title="Add to compare"><a
                                                                href="compare.html"><i class="fa fa-align-left"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>

                    </div>
                </section>
            @endif
            {{-- Featured Product End  --}}

        </div>

        <section class="ps-section--reviews" data-background="img/roundbg.png">
            <h3 class="ps-section__title"> <img src="img/quote-icon.png" alt>Latest reviews</h3>
            <div class="ps-section__content">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="1"
                    data-owl-item-sm="1" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5"
                    data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-review">
                        <div class="ps-review__text">There was a small mistake in the order. In return, I got the correct
                            order and I could keep the wrong one for myself.</div>
                        <div class="ps-review__name">Esther Howard</div>
                        <div class="ps-review__review">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="ps-review">
                        <div class="ps-review__text">I ordered on Friday evening and on Monday at 12:30 the package was
                            with me. I have never encountered such a fast order processing.</div>
                        <div class="ps-review__name">Albert Flores</div>
                        <div class="ps-review__review">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="ps-review">
                        <div class="ps-review__text">I ordered on Friday evening and on Monday at 12:30 the package was
                            with me. I have never encountered such a fast order processing.</div>
                        <div class="ps-review__name">Dianne Russell</div>
                        <div class="ps-review__review">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="ps-review">
                        <div class="ps-review__text">Everything is perfect. I would recommend!</div>
                        <div class="ps-review__name">Darlene Robertson</div>
                        <div class="ps-review__review">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="ps-review">
                        <div class="ps-review__text">There was a small mistake in the order. In return, I got the correct
                            order and I could keep the wrong one for myself.</div>
                        <div class="ps-review__name">Brooklyn Simmons</div>
                        <div class="ps-review__review">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="ps-review">
                        <div class="ps-review__text">Everything is perfect. I would recommend!</div>
                        <div class="ps-review__name">Kristin Watson</div>
                        <div class="ps-review__review">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="ps-review">
                        <div class="ps-review__text">I ordered on Friday evening and on Monday at 12:30 the package was
                            with me. I have never encountered such a fast order processing.</div>
                        <div class="ps-review__name">Mark J.</div>
                        <div class="ps-review__review">
                            <select class="ps-rating" data-read-only="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="selected">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($brands->isNotEmpty())
            <div class="ps-branch container">
                <h3 class="ps-branch__title">Popular Brands</h3>
                <div class="ps-branch__box">
                    @foreach ($brands as $brand)
                        @if ($brand->image)
                            <div class="ps-branch__item"><a href="javascript:;"><img src="{{ !empty($brand->image) ? url('storage/' . $brand->image) : 'https://ui-avatars.com/api/?name=' . urlencode($brand->name) }}"
                                        alt></a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

    </div>
@endsection
