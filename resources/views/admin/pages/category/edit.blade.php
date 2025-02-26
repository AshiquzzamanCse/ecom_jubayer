<x-admin-app-layout :title="'Category Edit'">

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-dark rounded-0 px-3">Back To List</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Edit Category In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.category.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" class="form-select">
                                <option selected disabled>Choose Option...</option>
                                <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Category Name</label>
                            <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{ old('name', $item->name) }}">
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="logoInput" class="mb-2">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logoInput">

                            <div class="mt-2">
                                <!-- Logo Image Preview -->
                                <img id="logoPreview" src="#" alt="Logo Preview" style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Current Logo</label>
                            <div>
                                <img src="{{ !empty($item->logo) ? url('storage/' . $item->logo) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}" style="width: 100px;height: 100px;" alt="">
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="imageInput" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="image" id="imageInput">

                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Current Image</label>
                            <div>
                                <img src="{{ !empty($item->image) ? url('storage/' . $item->image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}" style="width: 100px;height: 100px;" alt="">
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="bannerImageInput" class="mb-2">Banner Image</label>
                            <input type="file" class="form-control" name="banner_image" id="bannerImageInput">

                            <div class="mt-2">
                                <!-- Banner Image Preview -->
                                <img id="bannerImagePreview" src="#" alt="Banner Image Preview" style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 mb-3">
                            <label for="" class="mb-2">Current Banner</label>
                            <div>
                                <img src="{{ !empty($item->banner_image) ? url('storage/' . $item->banner_image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}" style="width: 100px;height: 100px;" alt="">
                            </div>
                        </div>

                        <div class="col-12 col-lg-12 mb-3">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // JavaScript for image previews
        document.getElementById('logoInput').addEventListener('change', function(event) {
            previewImage(event, 'logoPreview');
        });

        document.getElementById('imageInput').addEventListener('change', function(event) {
            previewImage(event, 'imagePreview');
        });

        document.getElementById('bannerImageInput').addEventListener('change', function(event) {
            previewImage(event, 'bannerImagePreview');
        });

        // Function to preview images
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Show the preview
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none'; // Hide the preview if no file is selected
            }
        }
    </script>

</x-admin-app-layout>

