@extends('frontend.dashboard')
@section('forntend')
    <div class="ps-categogy">
        <div class="container">

            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="ps-breadcrumb__item active" aria-current="page">Product</li>
            </ul>

            <div class="ps-categogy__content">

                <div class="row row-reverse">

                    <div class="col-12 col-md-9">

                        {{-- <div class="ps-categogy__wrapper">
                            <div class="ps-categogy__type"> <a href="category-list.html"><img src="img/icon/bars.svg"
                                        alt></a><a class="active" href="category-grid-detail.html"><img
                                        src="img/icon/gird2.svg" alt></a><a href="category-grid.html"><img
                                        src="img/icon/gird3.svg" alt></a><a href="category-grid-separate.html"><img
                                        src="img/icon/gird4.svg" alt></a></div>
                            <div class="ps-categogy__onsale">
                                <form>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="onSaleProduct">
                                        <label class="custom-control-label" for="onSaleProduct">Show only products
                                            on sale</label>
                                    </div>
                                </form>
                            </div>
                            <div class="ps-categogy__sort">
                                <form><span>Sort by</span>
                                    <select class="form-select">
                                        <option selected>Latest</option>
                                        <option value="Popularity">Popularity</option>
                                        <option value="Average rating">Average rating</option>
                                        <option value="Latest">Latest</option>
                                        <option value="Price: low to high">Price: low to high</option>
                                        <option value="Price: high to low">Price: high to low</option>
                                    </select>
                                </form>
                            </div>
                            <div class="ps-categogy__show">
                                <form><span>Show</span>
                                    <select class="form-select">
                                        <option selected>12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                        <option value="48">48</option>
                                    </select>
                                </form>
                            </div>
                        </div> --}}

                        <div class="ps-categogy--grid ps-categogy--detail">
                            <div class="row m-0">


                                <div class="col-6 col-lg-4 p-0">
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="product1.html">
                                                <figure><img src="img/products/054.jpg" alt="alt" /><img
                                                        src="img/products/057.jpg" alt="alt" />
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
                                                <div class="ps-badge ps-badge--hot">Hot</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__content"><a class="ps-product__branch"
                                                href="#">MyMedi</a>
                                            <h5 class="ps-product__title"><a href="product1.html">Somersung Sonic
                                                    X2000 Pro Black</a></h5>
                                            <div class="ps-product__meta"><span class="ps-product__price">$299.99</span>
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

                                <div class="col-6 col-lg-4 p-0">
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
                                        <div class="ps-product__content"><a class="ps-product__branch"
                                                href="#">BestPharm</a>
                                            <h5 class="ps-product__title"><a href="product1.html">Automatic blood
                                                    pressure monitor</a></h5>
                                            <div class="ps-product__meta"><span
                                                    class="ps-product__price sale">$90.65</span><span
                                                    class="ps-product__del">$60.65</span>
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
                        <div class="ps-pagination">
                            <ul class="pagination">
                                <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>


                    </div>

                    <div class="col-12 col-md-3">
                        <div class="ps-widget ps-widget--product">
                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control"
                                    href="#"><i class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content ps-widget__category">
                                    <ul class="menu--mobile">
                                        <li><a href="#">Diagnosis</a><span class="sub-toggle"><i
                                                    class="fa fa-chevron-down"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="#">Biopsy tools</a></li>
                                                <li><a href="#">Endoscopes</a></li>
                                                <li><a href="#">Monitoring</a></li>
                                                <li><a href="#">Otoscopes</a></li>
                                                <li><a href="#">Oxygen concentrators</a></li>
                                                <li><a href="#">Tables and assistants</a></li>
                                                <li><a href="#">Thermometer</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Equipment</a><span class="sub-toggle"><i
                                                    class="fa fa-chevron-down"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="#">Blades</a></li>
                                                <li><a href="#">Education</a></li>
                                                <li><a href="#">Germicidal lamps</a></li>
                                                <li><a href="#">Heart Health</a></li>
                                                <li><a href="#">Infusion stands</a></li>
                                                <li><a href="#">Lighting</a></li>
                                                <li><a href="#">Machines</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Higiene</a><span class="sub-toggle"><i
                                                    class="fa fa-chevron-down"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="#">Disposable products</a></li>
                                                <li><a href="#">Face masks</a></li>
                                                <li><a href="#">Gloves</a></li>
                                                <li><a href="#">Protective covers</a></li>
                                                <li><a href="#">Sterilization</a></li>
                                                <li><a href="#">Surgical foils</a></li>
                                                <li><a href="#">Uniforms</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Laboratory</a><span class="sub-toggle"><i
                                                    class="fa fa-chevron-down"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="#">Devices</a></li>
                                                <li><a href="#">Diagnostic tests</a></li>
                                                <li><a href="#">Disinfectants</a></li>
                                                <li><a href="#">Dyes</a></li>
                                                <li><a href="#">Pipettes</a></li>
                                                <li><a href="#">Test-tubes</a></li>
                                                <li><a href="#">Tubes</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Tools</a><span class="sub-toggle"><i
                                                    class="fa fa-chevron-down"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="#">Accessories Tools</a></li>
                                                <li><a href="#">Blood pressure</a></li>
                                                <li><a href="#">Capsules</a></li>
                                                <li><a href="#">Dental</a></li>
                                                <li><a href="#">Micrscope</a></li>
                                                <li><a href="#">Pressure</a></li>
                                                <li><a href="#">Sugar level</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Wound Care</a><span class="sub-toggle"><i
                                                    class="fa fa-chevron-down"></i></span>
                                            <ul class="sub-menu">
                                                <li><a href="#">Bandages</a></li>
                                                <li><a href="#">Gypsum foundations</a></li>
                                                <li><a href="#">Patches and tapes</a></li>
                                                <li><a href="#">Stomatology</a></li>
                                                <li><a href="#">Surgical sutures</a></li>
                                                <li><a href="#">Uniforms</a></li>
                                                <li><a href="#">Wound healing</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            {{-- <div class="ps-widget__block">
                                <h4 class="ps-widget__title">By price</h4><a class="ps-block-control"
                                    href="#"><i class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content">
                                    <div class="ps-widget__price">
                                        <div id="slide-price"></div>
                                    </div>
                                    <div class="ps-widget__input"><span class="ps-price"
                                            id="slide-price-min">$0</span><span class="bridge">-</span><span
                                            class="ps-price" id="slide-price-max">$820</span></div>
                                    <button class="ps-widget__filter">Filter</button>
                                </div>
                            </div> --}}

                            {{-- <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Color</h4><a class="ps-block-control" href="#"><i
                                        class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content">
                                    <div class="ps-widget__color">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colorGray">
                                            <label class="custom-control-label" for="colorGray"
                                                style="--bg-color: #5b6c8f"></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colorGreen">
                                            <label class="custom-control-label" for="colorGreen"
                                                style="--bg-color: #12a05c"></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colorRed">
                                            <label class="custom-control-label" for="colorRed"
                                                style="--bg-color: #f00000"></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colorYellow">
                                            <label class="custom-control-label" for="colorYellow"
                                                style="--bg-color: #ff9923"></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colorBlack">
                                            <label class="custom-control-label" for="colorBlack"
                                                style="--bg-color: #313330"></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colorBlue">
                                            <label class="custom-control-label" for="colorBlue"
                                                style="--bg-color: #58c8ec"></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="colorNavy">
                                            <label class="custom-control-label" for="colorNavy"
                                                style="--bg-color: #103178"></label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Brands</h4><a class="ps-block-control" href="#"><i
                                        class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content">
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="BestPharm">
                                            <label class="custom-control-label" for="BestPharm">BestPharm</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="HeartRate">
                                            <label class="custom-control-label" for="HeartRate">HeartRate</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="HeartShield">
                                            <label class="custom-control-label" for="HeartShield">HeartShield</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="iHeart">
                                            <label class="custom-control-label" for="iHeart">iHeart</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="iLovehealth">
                                            <label class="custom-control-label" for="iLovehealth">iLovehealth</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="Medialarm">
                                            <label class="custom-control-label" for="Medialarm">Medialarm</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="Medicstore">
                                            <label class="custom-control-label" for="Medicstore">Medicstore</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="MyMedi">
                                            <label class="custom-control-label" for="MyMedi">MyMedi</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="Pharmy">
                                            <label class="custom-control-label" for="Pharmy">Pharmy</label>
                                        </div>
                                    </div>
                                    <div class="ps-widget__item">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="WeTakeCare">
                                            <label class="custom-control-label" for="WeTakeCare">WeTakeCare</label>
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
@endsection
