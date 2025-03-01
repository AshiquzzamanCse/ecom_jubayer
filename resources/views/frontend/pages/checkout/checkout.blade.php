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
                <form action="https://nouthemes.net/html/mymedi/do_action" method="post">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="ps-checkout__form">
                                <h3 class="ps-checkout__heading">Billing details</h3>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Email address *</label>
                                            <input class="ps-input" type="email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">First name *</label>
                                            <input class="ps-input" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Last name *</label>
                                            <input class="ps-input" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Company name (optional)</label>
                                            <input class="ps-input" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Street address *</label>
                                            <input class="ps-input mb-3" type="text"
                                                placeholder="House number and street name">
                                            <input class="ps-input" type="text"
                                                placeholder="Apartment, suite, unit, etc. (optional)">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Town / City *</label>
                                            <input class="ps-input" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Postcode *</label>
                                            <input class="ps-input" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">County (optional)</label>
                                            <input class="ps-input" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Phone *</label>
                                            <input class="ps-input" type="text">
                                        </div>
                                    </div>
                                    <div class="col-12 ps-hidden" data-for="create-account">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label ps-label--danger">Create account
                                                password *</label>
                                            <div class="input-group">
                                                <input class="form-control ps-input" type="password" placeholder="Password">
                                                <div class="input-group-append"><a class="fa fa-eye-slash toogle-password"
                                                        href="javascript: vois(0);"></a></div>
                                            </div>
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
                                                    <label class="ps-checkout__label">First name *</label>
                                                    <input class="ps-input" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Last name *</label>
                                                    <input class="ps-input" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Company name
                                                        (optional)</label>
                                                    <input class="ps-input" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Street address *</label>
                                                    <input class="ps-input mb-3" type="text"
                                                        placeholder="House number and street name">
                                                    <input class="ps-input" type="text"
                                                        placeholder="Apartment, suite, unit, etc. (optional)">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Town / City *</label>
                                                    <input class="ps-input" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Postcode *</label>
                                                    <input class="ps-input" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">County (optional)</label>
                                                    <input class="ps-input" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Order notes (optional)</label>
                                            <textarea class="form-control" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
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
                                <div class="ps-checkout__row ps-product">
                                    <div class="ps-product__name">Somersung Sonic X2500 Pro White x <span>1</span>
                                    </div>
                                    <div class="ps-product__price">$399.99</div>
                                </div>
                                <div class="ps-checkout__row ps-product">
                                    <div class="ps-product__name">Digital Thermometer X30-Pro x <span>1</span></div>
                                    <div class="ps-product__price">$77.65</div>
                                </div>
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Subtotal</div>
                                    <div class="ps-product__price">$814.85</div>
                                </div>
                                <div class="ps-checkout__row">
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
                                </div>
                                <div class="ps-checkout__payment">
                                    <div class="payment-method">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="payment" checked>
                                            <label class="form-check-label" for="payment">Check payments</label>
                                        </div>
                                        <p class="ps-note">Please send a check to Store Name, Store Street, Store
                                            Town, Store State / County, Store Postcode.</p>
                                    </div>
                                    <div class="paypal-method">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="paypal">
                                            <label class="form-check-label" for="paypal"> PayPal <img
                                                    src="img/AM_mc_vs_ms_ae_UK.png" alt=""><a
                                                    href="https://www.paypal.com/uk/webapps/mpp/paypal-popup">What
                                                    is PayPal?</a></label>
                                        </div>
                                    </div>
                                    <div class="check-faq">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="agree-faq" checked>
                                            <label class="form-check-label" for="agree-faq"> I have read and agree
                                                to the website terms and conditions *</label>
                                        </div>
                                    </div>
                                    <button class="ps-btn ps-btn--warning">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
