@extends('frontend.dashboard')
@section('forntend')
    <div class="ps-wishlist">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="ps-breadcrumb__item active" aria-current="page">Wishlist</li>
            </ul>
            <h3 class="ps-wishlist__title">My wishlist</h3>
            <div class="ps-wishlist__content">

                {{-- <ul class="ps-wishlist__list">
                    <li>
                        <div class="ps-product ps-product--wishlist">
                            <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                    <figure><img src="img/products/001.jpg" alt="alt" /><img src="img/products/009.jpg"
                                            alt="alt" />
                                    </figure>
                                </a></div>
                            <div class="ps-product__content">
                                <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer X30-Pro</a></h5>
                                <div class="ps-product__row">
                                    <div class="ps-product__label">Price:</div>
                                    <div class="ps-product__value"><span class="ps-product__price sale">$77.65</span><span
                                            class="ps-product__del">$80.65</span>
                                    </div>
                                </div>
                                <div class="ps-product__row ps-product__stock">
                                    <div class="ps-product__label">Stock:</div>
                                    <div class="ps-product__value"><span class="ps-product__out-stock">Out of stock </span>
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
                    <li>
                        <div class="ps-product ps-product--wishlist">
                            <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                    <figure><img src="img/products/011.jpg" alt="alt" />
                                    </figure>
                                </a></div>
                            <div class="ps-product__content">
                                <h5 class="ps-product__title"><a href="product1.html">Hill-Rom Affinity III Progressa
                                        iBed</a></h5>
                                <div class="ps-product__row">
                                    <div class="ps-product__label">Price:</div>
                                    <div class="ps-product__value"><span class="ps-product__price">$488.23</span>
                                    </div>
                                </div>
                                <div class="ps-product__row ps-product__stock">
                                    <div class="ps-product__label">Stock:</div>
                                    <div class="ps-product__value"><span class="ps-product__in-stock">In Stock</span>
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
                                    <div class="ps-product__value">$488.23</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="ps-product ps-product--wishlist">
                            <div class="ps-product__remove"><a href="#"><i class="icon-cross"></i></a></div>
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                    <figure><img src="img/products/012.jpg" alt="alt" /><img src="img/products/013.jpg"
                                            alt="alt" />
                                    </figure>
                                </a></div>
                            <div class="ps-product__content">
                                <h5 class="ps-product__title"><a href="product1.html">Hill-Rom Affinity III Progressa
                                        iBed</a></h5>
                                <div class="ps-product__row">
                                    <div class="ps-product__label">Price:</div>
                                    <div class="ps-product__value"><span class="ps-product__price">$436.87</span>
                                    </div>
                                </div>
                                <div class="ps-product__row ps-product__stock">
                                    <div class="ps-product__label">Stock:</div>
                                    <div class="ps-product__value"><span class="ps-product__in-stock">In Stock</span>
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
                                    <div class="ps-product__value">$436.87</div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul> --}}

                <div class="ps-wishlist__table">
                    <table class="table ps-table ps-table--product">
                        <thead>
                            <tr>
                                <th class="ps-product__remove"></th>
                                <th class="ps-product__thumbnail">Image</th>
                                <th class="ps-product__name">Product name</th>
                                <th class="ps-product__meta">Unit price</th>
                                <th class="ps-product__status">Stock status</th>
                                <th class="ps-product__cart">Cart</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($cartWishlists as $cartWishlist)
                                <tr>
                                    <td class="ps-product__remove">
                                        <a type="submit" style="cursor:pointer" id="{{ $cartWishlist->rowId }}"
                                            onclick="wishlistRemove(this.id)">
                                            <i class="icon-cross"></i>
                                        </a>
                                    </td>
                                    <td class="">
                                        <a class="ps-product__image" style="width: 60px;height:60px">
                                            <figure><img src="{{ asset('storage/' . $cartWishlist->options->image) }}" alt>
                                            </figure>
                                        </a>
                                    </td>
                                    <td class="ps-product__name">
                                        <a href="">{{ $cartWishlist->name }}</a>
                                    </td>
                                    <td class="ps-product__meta">
                                        <span class="ps-product__price sale">Tk {{ $cartWishlist->price }}</span>
                                    </td>

                                    <td class="">
                                        @if ($cartWishlist->options->stock == 'stock_out')
                                            <span class="text-danger">Out of stock</span>
                                        @else
                                            <span class="text-success">Avaiable</span>
                                        @endif
                                    </td>


                                    <td class="ps-product__cart" >
                                        <a class="add_to_cart_btn_product" type="submit" style="cursor:pointer" id="{{$cartWishlist->rowId}}" data-product_id="{{ $cartWishlist->id }}">Add to cart</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Your wishlist is currently empty.</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
