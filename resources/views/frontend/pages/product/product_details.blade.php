@extends('frontend.dashboard')
@section('forntend')
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{ route('frontend.index') }}">Home</a></li>
            <li class="ps-breadcrumb__item"><a href="">{{ optional($product->category)->name }}</a></li>
            <li class="ps-breadcrumb__item"><a href="">{{ optional($product->subcategory)->name }}</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">{{ $product->name }}</li>
        </ul>
        <div class="ps-page__content">
            <div class="ps-product--detail">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="row">

                            <div class="col-12 col-xl-7">

                                <div class="ps-product--gallery">
                                    <div class="ps-product__thumbnail">
                                        @foreach ($multiImages as $image)
                                            <div class="slide">
                                                <img src="{{ asset('storage/' . $image->multi_image) }}"
                                                    alt="Product Image" />
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="ps-gallery--image">
                                        @foreach ($multiImages as $image)
                                            <div class="slide">
                                                <div class="ps-gallery__item">
                                                    <img src="{{ asset('storage/' . $image->multi_image) }}"
                                                        alt="Product Image" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                            </div>

                            <div class="col-12 col-xl-5">
                                <div class="ps-product__info">

                                    <div class="ps-product__branch">{{ optional($product->category)->name }}</div>
                                    <div class="ps-product__title" id="dpname">{{ $product->name }}</div>

                                    {{-- <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span class="ps-product__review">(5 Reviews)</span>
                                    </div> --}}

                                    <div class="ps-product__desc">
                                        <p>{{ $product->short_descp }}</p>
                                    </div>

                                    <div class="ps-product__type">
                                        <ul class="ps-product__list">
                                            {{-- <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text"
                                                    href="#">Health</a><a class="ps-list__text"
                                                    href="#">Thermometer</a>
                                            </li> --}}
                                            <li> <span class="ps-list__title">SKU Code: </span>{{ $product->code }}
                                            </li>
                                        </ul>
                                    </div>

                                    {{-- <div class="ps-product__social">
                                        <ul class="ps-social ps-social--color">
                                            <li><a class="ps-social__link facebook" href="#"><i
                                                        class="fa fa-facebook"> </i><span
                                                        class="ps-tooltip">Facebook</span></a></li>
                                            <li><a class="ps-social__link twitter" href="#"><i
                                                        class="fa fa-twitter"></i><span
                                                        class="ps-tooltip">Twitter</span></a></li>
                                            <li><a class="ps-social__link pinterest" href="#"><i
                                                        class="fa fa-pinterest-p"></i><span
                                                        class="ps-tooltip">Pinterest</span></a></li>
                                            <li class="ps-social__linkedin"><a class="ps-social__link linkedin"
                                                    href="#"><i class="fa fa-linkedin"></i><span
                                                        class="ps-tooltip">Linkedin</span></a></li>
                                            <li class="ps-social__reddit"><a class="ps-social__link reddit-alien"
                                                    href="#"><i class="fa fa-reddit-alien"></i><span
                                                        class="ps-tooltip">Reddit Alien</span></a></li>
                                            <li class="ps-social__email"><a class="ps-social__link envelope"
                                                    href="#"><i class="fa fa-envelope-o"></i><span
                                                        class="ps-tooltip">Email</span></a></li>
                                            <li class="ps-social__whatsapp"><a class="ps-social__link whatsapp"
                                                    href="#"><i class="fa fa-whatsapp"></i><span
                                                        class="ps-tooltip">WhatsApp</span></a></li>
                                        </ul>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="ps-product__feature">

                            <div class="ps-product__badge"><span class="ps-badge ps-badge--instock">
                                    {{ $product->stock }}</span>
                            </div>

                            <div class="ps-product__meta">

                                @if ($product->discount_price == null)
                                    <span class="ps-product__price" style="font-size: 22px">{{ $product->currancy }}
                                        {{ $product->selling_price }}</span>
                                @else
                                    <span class="ps-product__price" style="font-size: 22px">{{ $product->currancy }}
                                        {{ $product->discount_price }}</span>
                                    <span class="ps-product__del" style="font-size: 15px">{{ $product->currancy }}
                                        {{ $product->selling_price }}</span>
                                @endif

                            </div>

                            {{-- @if ($colors == null) --}}
                            {{-- <div class="ps-product__group">

                                <h6>Color</h6>

                                <div class="ps-product__color ps-select--feature">
                                    @foreach ($colors as $color)
                                        <a href="#" id="dcolor" data-value="{{ $color }}"
                                            title="{{ $color }}" style="background-color:{{ $color }};"></a>
                                    @endforeach
                                </div>


                            </div> --}}
                            {{-- @endif

                            @if ($sizes == null) --}}
                            {{-- <div class="ps-product__group">

                                <h6>Size</h6>

                                <div class="ps-product__size ps-select--feature">
                                    @foreach ($sizes as $size)
                                        <a href="#" id="dsize" data-value="{{ $size }}"
                                            title="{{ $size }}">{{ $size }}</a>
                                    @endforeach
                                </div>

                            </div> --}}
                            {{-- @endif --}}

                            {{-- ================================= --}}
                            <div class="ps-product__group">
                                <h6>Color</h6>
                                <select id="dcolor" class="ps-product__color ps-select--feature">
                                    @foreach ($colors as $color)
                                        <option value="{{ $color }}" style="background-color:{{ $color }};" title="{{ $color }}">
                                            {{ $color }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="ps-product__group">
                                <h6>Size</h6>
                                <select id="dsize" class="ps-product__size ps-select--feature">
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size }}" title="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- ================================= --}}

                            {{-- <div class="ps-product__quantity">
                                <h6>Quantity</h6>
                                <div class="def-number-input number-input safari_only">
                                    <button class="minus"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                            class="icon-minus"></i></button>
                                    <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                    <button class="plus"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                            class="icon-plus"></i></button>
                                </div>
                            </div> --}}

                            <input type="hidden" name="parent_id" id="dproduct_id" value="{{ $product->id }}">

                            <a type="submit" onclick="addToCartDetails()" class="ps-btn ps-btn--warning">Add to cart</a>

                            <div class="ps-product__variations">

                                <a class="add_to_wishlist ps-product__link"
                                    style="cursor: pointer; text-decoration:underline"
                                    data-product_id="{{ $product->id }}">Add to
                                    wishlist
                                </a>

                                <a class="ps-product__link" href="">Add to Compare</a>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="ps-product__content">

                    <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab"
                                data-toggle="tab" href="#description-content" role="tab"
                                aria-controls="description-content" aria-selected="true">Description</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" id="information-tab" data-toggle="tab"
                                href="#information-content" role="tab" aria-controls="information-content"
                                aria-selected="false">Specification</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" id="specification-tab"
                                data-toggle="tab" href="#specification-content" role="tab"
                                aria-controls="specification-content" aria-selected="false">Additional information</a>
                        </li>
                        {{-- <li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab"
                                href="#reviews-content" role="tab" aria-controls="reviews-content"
                                aria-selected="false">Reviews (5)</a></li> --}}
                    </ul>

                    <div class="tab-content" id="productContent" style="margin-bottom: 80px;">

                        <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                            aria-labelledby="description-tab">

                            {{-- <div class="ps-document">
                                <h2 class="ps-title">Binocular Course Microscope BM100 LED</h2>
                                <p class="ps-desc">Just a few seconds to measure your body temperature. Up to 5 users! The
                                    battery lasts up to 2 years. There are many variations of passages of Lorem Ipsum
                                    available, but the majority have suffered altevration in some form, by injected humour,
                                    or randomised words which don’t look even slightly believable.</p>
                                <p class="ps-desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen
                                    book.</p>
                                <ul class="ps-list">
                                    <li class="d-inline-block" style="margin: 0 55px 15px 0;"><img
                                            src="img/icon/bacterial.svg" alt=""><span>Study history up to 30
                                            days</span></li>
                                    <li class="d-inline-block" style="margin: 0 55px 15px 0;"><img
                                            src="img/icon/virus.svg" alt=""><span>Up to 5 users
                                            simultaneously</span></li>
                                    <li class="d-inline-block" style="margin: 0 55px 15px 0;"><img
                                            src="img/icon/ribbon.svg" alt=""><span>Has HEALTH certificate</span>
                                    </li>
                                </ul>
                                <table class="table ps-table ps-table--oriented m-0">
                                    <tbody>
                                        <tr>
                                            <th class="ps-table__th">Power</th>
                                            <td>5,049</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-table__th">Windows</th>
                                            <td>64bit Windows 7*, 8 or 10</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-table__th">Graphic Card</th>
                                            <td>4Gb dedicated Graphics card (such as NVIDIA – Open GL 4.0 or later)</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-table__th">HDD</th>
                                            <td>500Gb HDD (this is more driven by the amount of data you want to keep on
                                                your computer, rather than LSS itself)</td>
                                        </tr>
                                        <tr>
                                            <th class="ps-table__th">Screen</th>
                                            <td>Single HD Screen (1920×1080 with 100% desktop scaling) or 1366×768 with
                                                second monitor 1920×1080 or higher</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}

                            <p>{!! $product->long_descp !!}</p>

                        </div>

                        <div class="tab-pane fade" id="information-content" role="tabpanel"
                            aria-labelledby="information-tab">
                            <p>{!! $product->specification !!}</p>
                        </div>

                        <div class="tab-pane fade" id="specification-content" role="tabpanel"
                            aria-labelledby="specification-tab">
                            <p>{!! $product->assecrioes !!}</p>
                        </div>

                        {{-- <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="ps-product__tabreview">
                                <div class="ps-review--product">
                                    <div class="ps-review__row">
                                        <div class="ps-review__avatar"><img src="img/avatar/avatar-review.html"
                                                alt="alt" /></div>
                                        <div class="ps-review__info">
                                            <div class="ps-review__name">Mark J.</div>
                                            <div class="ps-review__date">Oct 30, 2021</div>
                                        </div>
                                        <div class="ps-review__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="ps-review__desc">
                                            <p>Everything is perfect. I would recommend!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-review--product">
                                    <div class="ps-review__row">
                                        <div class="ps-review__avatar"><img src="img/avatar/avatar-review2.html"
                                                alt="alt" /></div>
                                        <div class="ps-review__info">
                                            <div class="ps-review__name">Ann R.</div>
                                            <div class="ps-review__date">Oct 30, 2021</div>
                                        </div>
                                        <div class="ps-review__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="ps-review__desc">
                                            <p>There was a small mistake in the order. In return, I got the correct order
                                                and I could keep the wrong one for myself.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-review--product">
                                    <div class="ps-review__row">
                                        <div class="ps-review__avatar"><img src="img/avatar/avatar-review3.html"
                                                alt="alt" /></div>
                                        <div class="ps-review__info">
                                            <div class="ps-review__name">Jenna S.</div>
                                            <div class="ps-review__date">Oct 30, 2021</div>
                                        </div>
                                        <div class="ps-review__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="ps-review__desc">
                                            <p>I ordered on Friday evening and on Monday at 12:30 the package was with me. I
                                                have never encountered such a fast order processing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-review--product">
                                    <div class="ps-review__row">
                                        <div class="ps-review__avatar"><img src="img/avatar/avatar-review4.html"
                                                alt="alt" /></div>
                                        <div class="ps-review__info">
                                            <div class="ps-review__name">John M.</div>
                                            <div class="ps-review__date">Oct 30, 2021</div>
                                        </div>
                                        <div class="ps-review__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="ps-review__desc">
                                            <p>Everything is perfect. I would recommend!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-review--product">
                                    <div class="ps-review__row">
                                        <div class="ps-review__avatar"><img src="img/avatar/avatar-review.html"
                                                alt="alt" /></div>
                                        <div class="ps-review__info">
                                            <div class="ps-review__name">Mark J.</div>
                                            <div class="ps-review__date">Oct 30, 2021</div>
                                        </div>
                                        <div class="ps-review__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="ps-review__desc">
                                            <p>There was a small mistake in the order. In return I got the correct order and
                                                I could keep the wrong one for myself.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-form--review">
                                <div class="ps-form__title">Write a review</div>
                                <div class="ps-form__desc">Your email address will not be published. Required fields are
                                    marked *</div>
                                <form action="https://nouthemes.net/html/mymedi/do_action" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <label class="ps-form__label">Your rating *</label>
                                            <select class="ps-rating--form" data-value="0">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <label class="ps-form__label">Name *</label>
                                            <input class="form-control ps-form__input">
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <label class="ps-form__label">Email *</label>
                                            <input class="form-control ps-form__input">
                                        </div>
                                        <div class="col-12">
                                            <div class="ps-form__block">
                                                <label class="ps-form__label">Your review *</label>
                                                <textarea class="form-control ps-form__textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn ps-btn ps-btn--warning">Add Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
