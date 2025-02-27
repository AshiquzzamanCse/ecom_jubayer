<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

<script src="{{ asset('frontend/assets/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/lightGallery/dist/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/noUiSlider/nouislider.min.js') }}"></script>
<!-- custom code-->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>


<!-- Notyf CSS -->
<link href="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.js"></script>



<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>

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

                if ($.isEmptyObject(data.error)) {
                    notyf.success(data.success); // Success toast
                } else {
                    notyf.error(data.error); // Error toast
                }

            }
        });
    });
</script>

{{-- add_to_cart_btn_product --}}
