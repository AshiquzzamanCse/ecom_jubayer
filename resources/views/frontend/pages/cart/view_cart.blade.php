@extends('frontend.dashboard')
@section('forntend')
    <div class="ps-shopping">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="ps-breadcrumb__item active" aria-current="page">View Cart</li>
            </ul>

            <div class="ps-shopping__content">

                <div class="row">
                    <div class="col-12 col-md-7 col-lg-9">

                        {{-- <ul class="ps-shopping__list">

                            <li>
                                <div class="ps-product ps-product--wishlist">
                                    <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                            <figure><img src="img/products/055.jpg" alt="alt" />
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic X2500
                                                Pro White</a></h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span class="ps-product__price">$399.99</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">
                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__value">1</div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">$399.99</div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="ps-product ps-product--wishlist">
                                    <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                            <figure><img src="img/products/001.jpg" alt="alt" />
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer
                                                X30-Pro</a></h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span
                                                    class="ps-product__price sale">$77.65</span><span
                                                    class="ps-product__del">$80.65</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">
                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__value">1</div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">$77.65</div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul> --}}

                        <div class="ps-shopping__table">
                            <table class="table ps-table ps-table--product">
                                <thead>
                                    <tr>
                                        <th class="ps-product__remove"></th>
                                        <th class="ps-product__thumbnail">Image</th>
                                        <th class="ps-product__name">Product name</th>
                                        <th class="ps-product__name">Size</th>
                                        <th class="ps-product__name">Color</th>
                                        <th class="ps-product__meta">Unit price</th>
                                        <th class="ps-product__quantity">Quantity</th>
                                        <th class="ps-product__subtotal">Subtotal</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @forelse ($carts as $cart)
                                        <tr>
                                            <td class="ps-product__remove">
                                                <a href="javascript:void(0);" class="remove-from-cart"
                                                    data-rowid="{{ $cart->rowId }}">
                                                    <i class="icon-cross"></i>
                                                </a>
                                            </td>

                                            <td class="ps-product__thumbnail">
                                                <a class="ps-product__image" href="">
                                                    <figure><img src="{{ asset('storage/' . $cart->options->image) }}" alt>
                                                    </figure>
                                                </a>
                                            </td>
                                            <td class="ps-product__name">
                                                <a href="">{{ $cart->name }}</a>
                                            </td>

                                            <td class="">
                                                <a href="">{{ $cart->options->size }}</a>
                                            </td>

                                            <td class="">
                                                <a href="">{{ $cart->options->color }}</a>
                                            </td>

                                            <td class="ps-product__meta">
                                                <span class="ps-product__price sale">$ {{ $cart->price }}</span>
                                            </td>

                                            <td class="ps-product__quantity">
                                                <div class="def-number-input number-input safari_only">

                                                    {{-- <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="icon-minus"></i>
                                                    </button> --}}

                                                    <button class="minus" id="{{ $cart->rowId }}"
                                                        onclick="cartDecrement(this.id); this.parentNode.querySelector('input[type=number]').stepDown();">
                                                        <i class="icon-minus"></i>
                                                    </button>


                                                    <input class="quantity" min="0" name=""
                                                        value="{{ $cart->qty }}" type="number">

                                                    {{-- <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="icon-plus"></i>
                                                    </button> --}}

                                                    <button class="plus" id="{{ $cart->rowId }}"
                                                        onclick="cartIncrement(this.id); this.parentNode.querySelector('input[type=number]').stepUp();">
                                                        <i class="icon-plus"></i>
                                                    </button>


                                                </div>
                                            </td>

                                            <td class="ps-product__subtotal">$ {{ $cart->price * $cart->qty }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" style="text-align: center;">Your Cart Is Empty</td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>

                        {{-- <div class="ps-shopping__footer">
                            <div class="ps-shopping__coupon">
                                <input class="form-control ps-input" type="text" placeholder="Coupon code">
                                <button class="ps-btn ps-btn--primary" type="button">Apply coupon</button>
                            </div>

                        </div> --}}

                    </div>

                    <div class="col-12 col-md-5 col-lg-3">
                        <div class="ps-shopping__label">Cart totals</div>
                        <div class="ps-shopping__box">
                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Subtotal</div>
                                <div class="ps-shopping__price">$ {{ $cartSubTotal }}</div>
                            </div>

                            <div class="ps-shopping__row">
                                <div class="ps-shopping__label">Total</div>
                                <div class="ps-shopping__price">$ {{ $cartSubTotal }}</div>
                            </div>

                            <div class="ps-shopping__checkout">
                                <a class="ps-btn ps-btn--warning" href="{{ route('checkout') }}">Proceed to checkout</a>
                                <a class="ps-shopping__link" href="{{ route('all.product') }}">Continue To Shopping</a>
                            </div>
                        </div>
                    </div>




                </div>

                {{--
                <section class="ps-section--latest">
                    <div class="container">
                        <h3 class="ps-section__title">You may be interested in…</h3>
                        <div class="ps-section__carousel">
                            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                                data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5"
                                data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5"
                                data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/033.jpg" alt="alt" />
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
                                            <h5 class="ps-product__title"><a href="product1.html">3 Layer Disposable
                                                    Protective Face masks</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$14.52</span><span
                                                    class="ps-product__del">$17.24</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3" selected="selected">3</option>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/048.jpg" alt="alt" /><img
                                                        src="img/products/049.jpg" alt="alt" />
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
                                            <h5 class="ps-product__title"><a href="product1.html">Manual Blood
                                                    Pressure Apparatus</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$90.65</span><span
                                                    class="ps-product__del">$60.39</span>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/039.jpg" alt="alt" /><img
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
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="product1.html">Generic
                                                    Stethoscope Hearing Heartbeat Tool</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$38.39</span><span
                                                    class="ps-product__del">$53.99</span>
                                            </div>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3" selected="selected">3</option>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/018.jpg" alt="alt" /><img
                                                        src="img/products/037.jpg" alt="alt" />
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
                                            <h5 class="ps-product__title"><a href="product1.html">Backrest Biotec
                                                    Dental Equipment</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$497.65</span><span
                                                    class="ps-product__del">$369.65</span>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/046.jpg" alt="alt" /><img
                                                        src="img/products/037.jpg" alt="alt" />
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
                                            <h5 class="ps-product__title"><a href="product1.html">Blood Ketone
                                                    Monitoring Starter Kit</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$39.65</span><span
                                                    class="ps-product__del">$38.65</span>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/037.jpg" alt="alt" /><img
                                                        src="img/products/047.jpg" alt="alt" />
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
                                            <h5 class="ps-product__title"><a href="product1.html">Hill-Rom
                                                    CareAssist</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$816.65</span>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/032.jpg" alt="alt" /><img
                                                        src="img/products/038.jpg" alt="alt" />
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
                                            <h5 class="ps-product__title"><a href="product1.html">Health care
                                                    portable cardiac monitoring</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$511.65</span><span
                                                    class="ps-product__del">$135.65</span>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__product">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/043.jpg" alt="alt" /><img
                                                        src="img/products/038.jpg" alt="alt" />
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
                                            <h5 class="ps-product__title"><a href="product1.html">FDA&ISO Osstem
                                                    Dental Chair</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$488.65</span>
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
                                                        data-target="#popupAddcart">Add
                                                        to cart</a></div>
                                                <div class="ps-product__item cart" data-toggle="tooltip"
                                                    data-placement="left" title="Add to cart"><a href="#"><i
                                                            class="fa fa-shopping-basket"></i></a></div>
                                                <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                    title="Wishlist"><a href="wishlist.html"><i
                                                            class="fa fa-heart-o"></i></a></div>
                                                <div class="ps-product__item rotate" data-toggle="tooltip"
                                                    data-placement="left" title="Add to compare"><a
                                                        href="compare.html"><i class="fa fa-align-left"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}

            </div>
        </div>
    </div>
@endsection
