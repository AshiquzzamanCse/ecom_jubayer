@extends('frontend.dashboard')
@section('forntend')
    <div class="ps-checkout">
        <div class="container">
            <h3 class="ps-checkout__title"> Checkout</h3>
            <div class="ps-checkout__content">
                <div class="ps-checkout__wapper">
                    <p class="ps-checkout__text">Returning customer? <a href="my-account.html">Click here to
                            login</a></p>
                    {{-- <p class="ps-checkout__text">Have a coupon? <a href="shopping-cart.html">Click here to enter
                            your code</a></p> --}}
                </div>
                <form action="{{ route('checkout.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="ps-checkout__form">
                                <h3 class="ps-checkout__heading">Billing details</h3>
                                <div class="row">

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Email Address *</label>
                                            <input class="ps-input" type="email" name="billing_email" required>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">First name *</label>
                                            <input class="ps-input" name="billing_name" required type="text">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Phone *</label>
                                            <input class="ps-input" type="text" required name="billing_phone">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Street address *</label>
                                            <input class="ps-input mb-3" type="text"
                                                placeholder="House number and street name" name="billing_address_line1"
                                                required>
                                            <input class="ps-input" type="text"
                                                placeholder="Apartment, suite, unit, etc. (optional)"
                                                name="billing_address_line2">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Town / City *</label>
                                            <input class="ps-input" type="text" required name="billing_city">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Postcode</label>
                                            <input class="ps-input" type="text" name="billing_postal_code">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Country *</label>
                                            <input class="ps-input" type="text" required name="billing_country">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="ship-address">
                                                <label class="form-check-label" for="ship-address">Ship to a
                                                    different address?</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 ps-hidden" data-for="ship-address">

                                        <div class="row">

                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Name</label>
                                                    <input class="ps-input" type="text" name="shipping_name">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Phone</label>
                                                    <input class="ps-input" type="text" name="shipping_phone">
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Street Address</label>
                                                    <input class="ps-input mb-3" type="text"
                                                        placeholder="House number and street name"
                                                        name="shipping_address_line1">
                                                    <input class="ps-input" type="text"
                                                        placeholder="Apartment, suite, unit, etc."
                                                        name="shipping_address_line2">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Town / City</label>
                                                    <input class="ps-input" type="text" name="shipping_city">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Postcode</label>
                                                    <input class="ps-input" type="text" name="shipping_postal_code">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Country</label>
                                                    <input class="ps-input" type="text" name="shipping_country">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Order notes (optional)</label>
                                            <textarea class="form-control" rows="3" name="notes"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="ps-checkout__order">
                                <h3 class="ps-checkout__heading">Your order</h3>

                                <div class="ps-checkout__row">
                                    <div class="ps-title">Product</div>
                                    <div class="ps-title">Subtotal</div>
                                </div>

                                @foreach ($carts as $item)
                                    <div class="ps-checkout__row ps-product">
                                        <div class="ps-product__name">{{ $item->name }} x
                                            <span>{{ $item->qty }}</span>
                                        </div>
                                        <div class="ps-product__price">${{ $item->price }}</div>
                                    </div>
                                @endforeach

                                <div class="ps-checkout__row">
                                    <div class="ps-title">Grand Total</div>
                                    <th class="text-right">
                                        <input class="" type="hidden" name="total_amount"
                                            value="{{ $cartTotal }}">
                                        $ <b class="amount grandTotal">
                                            {{ $cartTotal }}</b>
                                    </th>
                                    <div class="ps-product__price">$ {{ $cartTotal }}</div>
                                </div>

                                {{-- <div class="ps-checkout__row">
                                    <div class="ps-title">Shipping</div>
                                    <div class="ps-checkout__checkbox">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="free-ship" checked>
                                            <label class="form-check-label" for="free-ship">Free shipping</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="price-ship">
                                            <label class="form-check-label" for="price-ship">Local Pickup:
                                                <span>$10.00</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="ps-checkout__row">
                                    <div class="ps-title">Total</div>
                                    <div class="ps-product__price">$814.85</div>
                                </div> --}}

                                <div class="ps-checkout__payment">

                                    <div class="payment-method">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="payment" required>
                                            <label class="form-check-label" for="payment">Check payments</label>
                                        </div>
                                        <p class="ps-note">Please send a check to Store Name, Store Street, Store
                                            Town, Store State / Country, Store Postcode.</p>
                                    </div>

                                    <div class="check-faq">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="agree-faq" checked>
                                            <label class="form-check-label" for="agree-faq"> I have read and agree
                                                to the website terms and conditions *</label>
                                        </div>
                                    </div>

                                    <button class="ps-btn ps-btn--warning" type="submit">Place order</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
