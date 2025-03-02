{{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}

<script src="{{ asset('frontend/assets/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/lightGallery/dist/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/noUiSlider/nouislider.min.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>

<!-- custom code-->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Notyf CSS -->
<link href="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.js"></script>

{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />


{{-- add_to_cart_btn_product --}}
<script>
    const notyf = new Notyf();

    $('.add_to_cart_btn_product').click(function() {

        var product_id = $(this).data('product_id');
        var qty = $(this).closest('.d-flex').find('.qty-input').val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '/product-store-cart',
            data: {
                product_id: product_id,
                qty: qty,
            },
            success: function(data) {

                miniCart();

                if ($.isEmptyObject(data.error)) {
                    notyf.success(data.success); // Success toast
                } else {
                    notyf.error(data.error); // Error toast
                }

            }
        });
    });
</script>

{{-- <script>
    const notyf = new Notyf();

    $('.add_to_cart_btn_product').click(function() {

        var product_id = $(this).data('product_id');
        var qty = $(this).closest('.d-flex').find('.qty-input').val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '/product-store-cart',
            data: {
                product_id: product_id,
                qty: qty,
            },
            success: function(data) {

                if ($.isEmptyObject(data.error)) {
                    notyf.success(data.success); // Success toast
                    // Update the cart count
                    $('#cart-count').text(data
                        .cart_count); // Assuming the cart count is returned in the response
                } else {
                    notyf.error(data.error); // Error toast
                }

            }
        });
    });
</script> --}}

{{-- miniCart Load --}}
<script type="text/javascript">
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function(response) {
                //console.log(response)

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);

                var miniCart = ""

                $.each(response.carts, function(key, value) {

                    //console.log(value.options.image)

                    // product/image/4KMJ2wiA0c1740887640.jpg
                    //http://127.0.0.1:8000/product/kenyon-harper-goal
                    // http://127.0.0.1:8000/storage/product/image/ebCvUasvme1740887686.jpg

                    miniCart += ` <ul class="ps-cart__items">

                                <li class="ps-cart__item">

                                    <div class="ps-product--mini-cart">

                                        <a class="ps-product__thumbnail"
                                            href="">
                                            <img src="http://127.0.0.1:8000/storage/${value.options.image}"
                                                alt="" />
                                        </a>

                                        <div class="ps-product__content">
                                            <p class="ps-product__meta">${value.name}</p>

                                            <p class="ps-product__meta"><span class="ps-product__price">$${value.price}</span> x <span class="ps-product__price">${value.qty}</span>
                                            </p>

                                        </div>

                                        <a class="ps-product__remove" type="submit" style="cursor: pointer;" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i
                                                class="icon-cross"></i>
                                        </a>

                                    </div>

                                </li>

                            </ul> `
                });

                $('#miniCart').html(miniCart);

            }

        })
    }
    miniCart();
</script>

{{-- MiNiCart Remove  --}}
<script>
    function miniCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/minicart/product/remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();

                // Initialize Notyf
                const notyf = new Notyf({
                    duration: 3000,
                    position: {
                        x: 'right',
                        y: 'top'
                    }
                });

                if ($.isEmptyObject(data.error)) {
                    notyf.success(data.success);
                } else {
                    notyf.error(data.error);
                }
            }
        });
    }
</script>

<script>
    function cartIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-increment/" + rowId,
            dataType: 'json',
            success: function(data) {
                window.location.href = "/view-cart"; // Redirect to the view-cart page
            }
        });
    }

    function cartDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-decrement/" + rowId,
            dataType: 'json',
            success: function(data) {
                window.location.href = "/view-cart"; // Redirect to the view-cart page
            }
        });
    }
</script>


{{-- <script>
    function cartIncrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-increment/" + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();

            }
        });
    }

    function cartDecrement(rowId) {
        $.ajax({
            type: 'GET',
            url: "/cart-decrement/" + rowId,
            dataType: 'json',
            success: function(data) {
                miniCart();

            }
        });
    }
</script> --}}


{{-- add_to_cart_btn_product --}}
{{-- <script>
    $(document).on('click', '.remove-from-cart', function(e) {
        e.preventDefault();

        var rowId = $(this).data('rowid');

        // Make an AJAX request to remove the product from the cart
        $.ajax({
            url: '/cart/remove/' + rowId, // Ensure this is the correct URL for your route
            type: 'GET', // or POST depending on your route definition

            success: function(response) {
                if (response.success) {
                    // Show success toast notification
                    notyf.success(response.success); // This will show the success message

                    // Optionally reload the page
                    location.reload(); // Reload to reflect cart update
                } else {
                    notyf.error("Something went wrong. Please try again later.");
                }
            },
            error: function(xhr, status, error) {
                // Show error toast notification
                notyf.error("Something went wrong. Please try again later.");
            }

        });
    });
</script> --}}


{{-- =====================WishList Product All Code Start ============================ --}}

{{-- Add Cart To WishList --}}
<script>
    $('.add_to_wishlist').click(function() {
        var product_id = $(this).data('product_id');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                product_id: product_id,
            },
            url: '/add-to-wishlist',
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    toastr.success(data.success, 'Success', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000
                    });

                    // Update the wishlist count dynamically
                    var wishlistCount = data
                        .wishlistCount; // Get the updated count from the response
                    $('#cartWishlistQty').text(
                        wishlistCount); // Update the wishlist count in the DOM
                } else {
                    toastr.error(data.error, 'Error', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000
                    });
                }
            }
        });
    });
</script>

{{-- Load Wishlist --}}
<script>
    function wishlist() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/get-wishlist',

            success: function(response) {

                $('#cartWishlistQty').text(response.cartWishlistQty);

                var tableHtml = "";

                if (response.cartWishlist.length === 0) {

                } else {
                    $.each(response.cartWishlist, function(key, value) {
                        tableHtml +=

                            ``;

                    });

                    $('#wishlistLink').show();
                }

                $('#wishlist').html(tableHtml);
            }
        });
    }

    wishlist();
</script>

{{-- Add Cart Wishlist --}}
<script>
    function addToCartWishlist(id) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                product_id: id // Make sure to pass product_id here
            },
            url: "/add-to-cart-wishlist/" + id, // Ensure the URL is correct

            success: function(data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    });
                }
            }
        });
    }
</script>

{{-- Wishlist Remove --}}
<script>
    function wishlistRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/wishlist/product/remove/' + rowId,
            dataType: 'json',
            success: function(data) {
                // After successful removal, redirect to another page
                if ($.isEmptyObject(data.error)) {
                    toastr.success(data.success, 'Success', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000
                    });

                    // Redirect to wishlist page or any other URL
                    window.location.href = '/wishlist-product'; // Change this URL to where you want to go
                } else {
                    toastr.error(data.error, 'Error', {
                        positionClass: 'toast-top-right',
                        timeOut: 3000
                    });
                }
            },
            error: function() {
                toastr.error('There was an error processing your request.', 'Error', {
                    positionClass: 'toast-top-right',
                    timeOut: 3000
                });
            }
        });
    }
</script>

{{-- =====================Wishlist Product All Code End ============================== --}}


<script>
    function addToCartDetails() {
        var name = $('#dpname').text();
        var id = $('#dproduct_id').val();
        var color = $('#dcolor').val(); // Get selected color
        var size = $('#dsize').val(); // Get selected size

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                color: color,
                size: size,
                name: name,
            },
            url: "/dcart/data/store/" + id,
            success: function(data) {
                miniCart();

                if ($.isEmptyObject(data.error)) {
                    notyf.success(data.success); // Success toast
                } else {
                    notyf.error(data.error); // Error toast
                }


            }
        });
    }
</script>
