<x-admin-app-layout :title="'Category Create'">

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Cateory</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Cateory</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Create Cateory In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" required  class="form-select" id="">
                                <option value="" selected disabled>Choose Option...</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Category Name</label>
                            <input type="text" class="form-control" required placeholder="Category Name" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logoInput">
                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="logoPreview" src="#" alt="Logo Preview"
                                    style="display: none; width: 80px; height: 80px;" />
                            </div>
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="image" id="imageInput">
                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display: none; width: 80px; height: 80px;" />
                            </div>
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Banner Image</label>
                            <input type="file" class="form-control" name="banner_image" id="bannerInput">
                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="bannerPreview" src="#" alt="Banner Preview"
                                    style="display: none; width: 80px; height: 80px;" />
                            </div>
                        </div>


                        <div class="col-12 col-lg-12 mb-3">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Data
                                Submit</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>

    <script>
        // Function to handle image preview
        function handleImagePreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            input.addEventListener('change', function(event) {
                const file = event.target.files[0];

                // If there's a file, show the image preview
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result; // Set the preview image source to the file's data URL
                        preview.style.display = 'block'; // Show the preview image
                    };
                    reader.readAsDataURL(file); // Read the file as a data URL
                } else {
                    preview.style.display = 'none'; // Hide the preview if no file is selected
                }
            });
        }

        // Initialize image preview for all inputs
        handleImagePreview('logoInput', 'logoPreview');
        handleImagePreview('imageInput', 'imagePreview');
        handleImagePreview('bannerInput', 'bannerPreview');
    </script>


</x-admin-app-layout>
