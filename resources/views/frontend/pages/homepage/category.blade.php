@if ($categorys->isNotEmpty())
    <div class="container my-5">

        <section class="ps-section--categories">
            <h3 class="ps-section__title">Popular Categories</h3>
            <div class="ps-section__content">
                <div class="ps-categories__list">

                    @foreach ($categorys as $category)
                        @if ($category->name)
                            <div class="ps-categories__item">
                                <a class="ps-categories__link" href="">

                                    <img src="{{ !empty($category->logo) ? url('storage/' . $category->logo) : 'https://ui-avatars.com/api/?name=' . urlencode($category->name) }}"
                                        alt>
                                </a>
                                <a class="ps-categories__name" href="">
                                    {{ $category->name }}
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>

                {{-- <div class="text-center"> <a class="ps-categories__show" href="category-grid.html">Show all</a></div> --}}

            </div>
        </section>
    </div>
@endif
