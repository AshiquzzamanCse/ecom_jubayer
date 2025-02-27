<x-admin-app-layout :title="'HomePage Setting'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">HomePage</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All HomePage</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <!--begin::Form-->
        <form class="form" action="{{ route('admin.homepages.updateOrCreate') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card p-3">

                <div class="card-body">

                    <!--begin::Input group-->
                    <div class="row">

                        <div class="col-lg-4 mb-3">
                            <label for="site_name" class="mb-2">Banner One Title</label>

                            <input id="site_name" type="text" class="form-control" name="homepage_banner_one_title"
                                value="{{ old('homepage_banner_one_title', optional($homepage->first())->homepage_banner_one_title) }}"
                                placeholder="Enter Banner One Title">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="site_name" class="mb-2">Banner One Badge</label>

                            <input id="site_name" type="text" class="form-control" name="homepage_banner_one_badge"
                                value="{{ old('homepage_banner_one_badge', optional($homepage->first())->homepage_banner_one_badge) }}"
                                placeholder="Enter Banner One Badge">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="site_name" class="mb-2">Banner One Url</label>

                            <input id="site_name" type="text" class="form-control" name="homepage_banner_one_url"
                                value="{{ old('homepage_banner_one_url', optional($homepage->first())->homepage_banner_one_url) }}"
                                placeholder="Enter Banner One Url">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="site_name" class="mb-2">Banner Two Title</label>

                            <input id="site_name" type="text" class="form-control" name="homepage_banner_two_title"
                                value="{{ old('homepage_banner_two_title', optional($homepage->first())->homepage_banner_two_title) }}"
                                placeholder="Enter Banner Two Title">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="site_name" class="mb-2">Banner Two Badge</label>

                            <input id="site_name" type="text" class="form-control" name="homepage_banner_two_badge"
                                value="{{ old('homepage_banner_two_badge', optional($homepage->first())->homepage_banner_two_badge) }}"
                                placeholder="Enter Banner Two Badge">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="site_name" class="mb-2">Banner Two Url</label>

                            <input id="site_name" type="text" class="form-control" name="homepage_banner_two_url"
                                value="{{ old('homepage_banner_two_url', optional($homepage->first())->homepage_banner_two_url) }}"
                                placeholder="Enter Banner Two Url">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="homepage_feature_one" class="mb-2">Feature One</label>
                            <input id="homepage_feature_one" type="text" class="form-control"
                                name="homepage_feature_one"
                                value="{{ old('homepage_feature_one', optional($homepage->first())->homepage_feature_one) }}"
                                placeholder="Enter Feature One">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="homepage_feature_two" class="mb-2">Feature Two</label>
                            <input id="homepage_feature_two" type="text" class="form-control"
                                name="homepage_feature_two"
                                value="{{ old('homepage_feature_two', optional($homepage->first())->homepage_feature_two) }}"
                                placeholder="Enter Feature Two">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label for="homepage_feature_three" class="mb-2">Feature Three</label>
                            <input id="homepage_feature_three" type="text" class="form-control"
                                name="homepage_feature_three"
                                value="{{ old('homepage_feature_three', optional($homepage->first())->homepage_feature_three) }}"
                                placeholder="Enter Feature Three">
                        </div>


                        <div class="col-lg-3 mb-3">
                            <label for="homepage_banner_one_image" class="mb-2">Banner Image One</label>
                            <input type="file" class="form-control" name="homepage_banner_one_image"
                                onchange="previewImage('homepage_banner_one_image', 'logo_preview')">

                            <!-- Preview Image -->
                            <img id="logo_preview"
                                src="{{ !empty(optional($homepage->first())->homepage_banner_one_image) && file_exists(public_path('storage/' . optional($homepage->first())->homepage_banner_one_image)) ? asset('storage/' . optional($homepage->first())->homepage_banner_one_image) : asset('frontend/images/no-logo(217-55).jpg') }}"
                                style="width: 100px; height: 100px" class="mt-2" alt="">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="homepage_banner_two_image" class="mb-2">Banner Image Two</label>
                            <input type="file" class="form-control" name="homepage_banner_two_image"
                                onchange="previewImage('homepage_banner_two_image', 'favicon_preview')">

                            <!-- Preview Image -->
                            <img id="favicon_preview"
                                src="{{ !empty(optional($homepage->first())->homepage_banner_two_image) && file_exists(public_path('storage/' . optional($homepage->first())->homepage_banner_two_image)) ? asset('storage/' . optional($homepage->first())->homepage_banner_two_image) : asset('frontend/images/no-logo(217-55).jpg') }}"
                                style="width: 100px; height: 100px" class="mt-2" alt="">
                        </div>



                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Submit
                                Or Update</button>
                        </div>

                    </div>

                </div>

            </div>
        </form>

    </div>

    <script>
        function previewImage(inputId, previewId) {
            var input = document.querySelector(`input[name="${inputId}"]`);
            var preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


</x-admin-app-layout>
