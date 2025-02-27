@if ($banners->isNotEmpty())
        <section class="ps-section--banner">
            <div class="ps-section__overlay">
                <div class="ps-section__loading"></div>
            </div>
            <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000" data-owl-gap="0"
                data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
                data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">

                @foreach ($banners as $banner)
                    @if ($banner->image)
                        <!-- Check if the banner has an image -->
                        <div class="ps-banner" style="background:#DAECFA;">
                            <div class="container container-initial">
                                <div class="ps-banner__block">
                                    <div class="ps-banner__content">
                                        <h2 class="ps-banner__title">{{ $banner->name }}</h2>
                                        <div class="ps-banner__desc">{{ $banner->sub_name }}</div>
                                        <div class="ps-banner__price"> <span>{{ $banner->badge }}</span></div>
                                        <a class="bg-warning ps-banner__shop" href="#">View Product</a>
                                        {{-- <div class="ps-banner__persen bg-warning ps-center">-30%</div> --}}
                                    </div>
                                    <div class="ps-banner__thumnail">
                                        {{-- <img class="ps-banner__round" src="" alt="{{ $banner->name }}" /> --}}
                                        <img class="ps-banner__image" style="width: 550px;height: 550px;"
                                            src="{{ !empty($banner->image) ? url('storage/' . $banner->image) : 'https://ui-avatars.com/api/?name=' . urlencode($banner->name) }}"
                                            alt="{{ $banner->name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </section>
    @endif