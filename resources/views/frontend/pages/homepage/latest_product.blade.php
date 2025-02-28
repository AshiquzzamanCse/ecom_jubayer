@if ($latest_products->isNotEmpty())
    <section class="ps-section--latest">
        <div class="container">
            <h3 class="ps-section__title">Latest Products</h3>
            <div class="ps-section__carousel">
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0"
                    data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2"
                    data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000"
                    data-owl-mousedrag="on">

                    @foreach ($latest_products as $latest_product)
                        @if ($latest_product->name)
                            <div class="ps-section__product">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail">

                                        <a class="ps-product__image"
                                            href="{{ route('product.details', $latest_product->slug) }}"
                                            style="width: 100%;height: 200px;">
                                            <figure>
                                                <img src="{{ !empty($latest_product->image) ? url('storage/' . $latest_product->image) : 'https://ui-avatars.com/api/?name=' . urlencode($latest_product->name) }}"
                                                    alt="alt" />

                                                <img src="{{ !empty($latest_product->image) ? url('storage/' . $latest_product->image) : 'https://ui-avatars.com/api/?name=' . urlencode($latest_product->name) }}"
                                                    alt="alt" />

                                            </figure>
                                        </a>

                                        <div class="ps-product__actions">

                                            <div class="ps-product__item"><a class="add_to_wishlist"
                                                    style="cursor: pointer;" data-product_id="{{ $latest_product->id }}" title="Wishlist"><i
                                                        class="fa fa-heart-o"></i></a>
                                            </div>

                                            <div class="ps-product__item rotate" data-toggle="tooltip"
                                                data-placement="left" title="Add to compare"><a href="#"
                                                    data-toggle="modal" data-target="#popupCompare"><i
                                                        class="fa fa-align-left"></i></a></div>

                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Quick view"><a href="#" data-toggle="modal"
                                                    data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>

                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Add to cart">

                                                <a type="submit" style="cursor:pointer;"
                                                    class="add_to_cart_btn_product"
                                                    data-product_id="{{ $latest_product->id }}">
                                                    <i class="fa fa-shopping-basket"></i>
                                                </a>

                                            </div>

                                        </div>

                                        @if ($latest_product->discount_price == null)
                                            {{-- <span class="badge rounded-pill bg-dark">No Discount</span> --}}
                                        @else
                                            @php
                                                $amount =
                                                    $latest_product->selling_price - $latest_product->discount_price;
                                                $discount = ($amount / $latest_product->selling_price) * 100;
                                            @endphp
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--hot">{{ round($discount) }}%</div>
                                            </div>
                                        @endif

                                    </div>

                                    <div class="ps-product__content">
                                        <p class="mb-0">{{ optional($latest_product->category)->name }}</p>

                                        <h5 class=""><a
                                                href="{{ route('product.details', $latest_product->slug) }}">{{ $latest_product->name }}</a>
                                        </h5>

                                        <div class="ps-product__meta">

                                            <span class="ps-product__price sale">Tk
                                                {{ $latest_product->selling_price }}</span>
                                            @if ($latest_product->discount_price == null)
                                            @else
                                                <span class="ps-product__del">Tk
                                                    {{ $latest_product->discount_price }}</span>
                                            @endif
                                        </div>

                                        {{-- <div class="ps-product__rating">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5" selected="selected">5</option>
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
                                                    href="#" data-toggle="modal" data-target="#popupAddcart">Add
                                                    to cart</a></div>
                                            <div class="ps-product__item cart" data-toggle="tooltip"
                                                data-placement="left" title="Add to cart"><a href="#"><i
                                                        class="fa fa-shopping-basket"></i></a></div>
                                            <div class="ps-product__item" data-toggle="tooltip" data-placement="left"
                                                title="Wishlist"><a href="wishlist.html"><i
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
        </div>
    </section>
@endif
