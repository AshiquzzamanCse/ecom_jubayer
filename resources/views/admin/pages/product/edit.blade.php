{{-- <x-admin-app-layout :title="'Project Edit'"> --}}


{{-- <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Project</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.project.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Edit Project In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <form action="{{ route('admin.project.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Status Field -->
                        <div class="col-6 col-lg-2 mb-3">
                            <label for="" class="mb-2">Status</label>
                            <select name="status" class="form-select">
                                <option selected disabled>Choose Option...</option>
                                <option value="active" {{ $item->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $item->status == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Name Field -->
                        <div class="col-6 col-lg-4 mb-3">
                            <label for="" class="mb-2">Name</label>
                            <input type="text" class="form-control" placeholder="Project Name" name="name"
                                value="{{ old('name', $item->name) }}">
                        </div>

                        <!-- Short Description Field -->
                        <div class="col-6 col-lg-12 mb-3">
                            <label for="" class="mb-2">Short Description</label>
                            <textarea name="short_descp" placeholder="Short Description" cols="3" rows="3" class="form-control">{{ old('short_descp', $item->short_descp) }}</textarea>
                        </div>

                        <!-- Long Description Field -->
                        <div class="col-6 col-lg-12 mb-3">
                            <label for="" class="mb-2">Long Description</label>
                            <textarea name="long_descp" placeholder="Long Description" cols="10" rows="10" class="editor">{!! old('long_descp', $item->long_descp) !!}</textarea>
                        </div>



                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="image" id="imageInput">
                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <!-- Current Image Display -->
                        <div class="col-6 col-lg-1 mb-3">
                            <label for="" class="mb-2">Current Image</label>
                            <div>
                                <img src="{{ !empty($item->image) ? url('storage/' . $item->image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                    style="width: 80px; height: 80px;" alt="Current Image">
                            </div>
                        </div>


                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Multi Image</label>
                            <input type="file" class="form-control" name="multi_image[]" id="multiImageInput"
                                multiple>
                            <div id="multiImagePreview" class="mt-2"></div>
                            <!-- Container for multiple image previews -->
                        </div>

                        <!-- Current Multi Image Display -->
                        <div class="col-6 col-lg-5 mb-3">
                            <label for="" class="mb-2">Current Multi Image</label>
                            <div>
                                @foreach ($multiImages as $multiImage)
                                    <div class="multi-image-item">
                                        <input type="hidden" name="multi_image_id[{{ $multiImage->id }}]"
                                            value="{{ $multiImage->id }}">

                                        <!-- Image Display -->
                                        <img src="{{ url('storage/' . $multiImage->multi_image) }}"
                                            style="width: 80px; height: 80px;" class="me-2 mb-2" alt="Multi Image">

                                        <!-- Input for new image upload -->
                                        <input type="file" name="multi_image[{{ $multiImage->id }}]">

                                        <!-- Delete Checkbox or Button -->
                                        <label>
                                            <input type="checkbox" name="delete_multi_image[{{ $multiImage->id }}]"
                                                value="1">
                                            Delete
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <!-- Submit Button -->
                        <div class="col-12 col-lg-12 mb-3">
                            <button type="submit" class="btn btn-outline-primary rounded-0 px-3 float-end">Update
                                Data</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>

    </div> --}}

{{-- <script>
        // JavaScript for single image preview
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            // If there's a file, show the image preview
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the preview image source to the file's data URL
                    preview.style.display = 'block'; // Show the preview image

                    // Set the width and height of the image preview
                    preview.style.width = '80px'; // Example: Width 100% of the container
                    preview.style.height = '80px'; // Maintain aspect ratio based on the width
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.style.display = 'none'; // Hide the preview if no file is selected
            }
        });

        // JavaScript for multiple image preview
        document.getElementById('multiImageInput').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('multiImagePreview');

            // Clear previous previews
            previewContainer.innerHTML = '';

            // Loop through each selected file
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                // Create an image element for each file
                reader.onload = function(e) {
                    const imgElement = document.createElement('img');
                    imgElement.src = e.target.result; // Set the image source
                    imgElement.style.width = '80px'; // Set image width
                    imgElement.style.height = '80px'; // Maintain aspect ratio
                    imgElement.style.marginRight = '10px'; // Space between images
                    previewContainer.appendChild(imgElement); // Append the image to the preview container
                };
                reader.readAsDataURL(file); // Read the file as a data URL
            }
        });
    </script> --}}


{{-- </x-admin-app-layout> --}}

<x-admin-app-layout :title="'Product Edit'">
    <style>
        .bootstrap-tagsinput {
            width: 100%;
            padding: 6px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .bootstrap-tagsinput .tag {
            background: #0d6efd;
            padding: 5px;
            border-radius: 3px;
            color: #fff;
        }
    </style>

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-dark rounded-0 px-3">Back To List
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Edit Product In Site</h6>
        <hr />

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-grey text-white">
                <h5 class="mb-0">Add New Product</h5>
            </div>
            <div class="card-body p-4">

                <form action="{{ route('admin.product.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <!-- Status -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select">
                                <option selected disabled>Choose...</option>
                                <option value="active"
                                    {{ old('status', $item->status ?? '') == 'active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive"
                                    {{ old('status', $item->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- Brand Name -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Brand</label>
                            <select name="brand_id" class="form-select">
                                <option selected disabled>Choose...</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ old('brand_id', $item->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Category -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Category</label>
                            <select name="category_id" class="form-select" id="category">
                                <option selected disabled>Choose...</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $item->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SubCategory (Dynamically Loaded) -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">SubCategory</label>
                            <select name="subcategory_id" class="form-select" id="subcategory">
                                <option selected disabled>Choose...</option>
                                @if (isset($subcategories))
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ old('subcategory_id', $item->subcategory_id ?? '') == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>


                        <!-- Product Name -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Product Name</label>
                            <input type="text" class="form-control" required name="name"
                                placeholder="Enter product name" value="{{ old('name', $item->name ?? '') }}">
                        </div>

                        <!-- Code & Qty -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Code</label>
                            <input type="text" class="form-control" required name="code" placeholder="Enter code"
                                value="{{ old('code', $item->code ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Quantity</label>
                            <input type="number" class="form-control" required name="qty"
                                placeholder="Enter quantity" value="{{ old('qty', $item->qty ?? '') }}">
                        </div>

                        <!-- Prices -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Selling Price</label>
                            <input type="number" class="form-control" required name="selling_price"
                                placeholder="Selling price"
                                value="{{ old('selling_price', $item->selling_price ?? '') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Discount Price</label>
                            <input type="number" class="form-control" name="discount_price"
                                placeholder="Discount price"
                                value="{{ old('discount_price', $item->discount_price ?? '') }}">
                        </div>

                        <!-- Size & Color -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Size (comma separated)</label>
                            <input type="text" class="form-control" name="size" placeholder="e.g., S, M, L, XL"
                                data-role="tagsinput" value="{{ old('size', $item->size ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Color (comma separated)</label>
                            <input type="text" class="form-control" name="color"
                                placeholder="e.g., Red, Blue, Green" data-role="tagsinput"
                                value="{{ old('color', $item->color ?? '') }}">
                        </div>

                        <!-- Stock -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Stock</label>
                            <select name="stock" class="form-select">
                                <option selected disabled>Choose...</option>
                                <option value="available"
                                    {{ old('stock', $item->stock ?? '') == 'available' ? 'selected' : '' }}>Available
                                </option>
                                <option value="stock_out"
                                    {{ old('stock', $item->stock ?? '') == 'stock_out' ? 'selected' : '' }}>Stock Out
                                </option>
                            </select>
                        </div>

                        <!-- Textareas -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Short Description</label>
                            <textarea name="short_descp" class="form-control" rows="3" placeholder="Short description">{{ old('short_descp', $item->short_descp ?? '') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Specification</label>
                            <textarea name="specification" class="form-control" rows="3" placeholder="Specifications">{{ old('specification', $item->specification ?? '') }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Long Description</label>
                            <textarea name="long_descp" class="editor form-control" rows="5" placeholder="Long description">{!! old('long_descp', $item->long_descp ?? '') !!}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Accessory</label>
                            <textarea name="assecrioes" class="editor form-control" rows="5" placeholder="Accessory">{!! old('assecrioes', $item->assecrioes ?? '') !!}</textarea>
                        </div>

                        <!-- Checkboxes -->
                        <div class="col-md-12 mt-3">
                            <label class="form-label fw-semibold">Product Highlights</label>
                            <div class="d-flex gap-3 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hot_deal" value="1"
                                        id="hot_deal"
                                        {{ old('hot_deal', $item->hot_deal ?? 0) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hot_deal">Hot Deal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1"
                                        id="featured"
                                        {{ old('featured', $item->featured ?? 0) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="best_seeling"
                                        value="1" id="best_seeling"
                                        {{ old('best_seeling', $item->best_seeling ?? 0) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="best_seeling">Best Selling</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="new" value="1"
                                        id="new" {{ old('new', $item->new ?? 0) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="new">New</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Image</label>
                            <input type="file" class="form-control" name="image" id="imageInput">
                            <div class="mt-2">
                                <!-- Image Preview -->
                                <img id="imagePreview" src="#" alt="Image Preview"
                                    style="display: none; width: 30%; height: auto;" />
                            </div>
                        </div>

                        <!-- Current Image Display -->
                        <div class="col-6 col-lg-1 mb-3">
                            <label for="" class="mb-2">Current Image</label>
                            <div>
                                <img src="{{ !empty($item->image) ? url('storage/' . $item->image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->name) }}"
                                    style="width: 80px; height: 80px;" alt="Current Image">
                            </div>
                        </div>


                        <div class="col-3 col-lg-3 mb-3">
                            <label for="" class="mb-2">Multi Image</label>
                            <input type="file" class="form-control" name="multi_image[]" id="multiImageInput"
                                multiple>
                            <div id="multiImagePreview" class="mt-2"></div>
                            <!-- Container for multiple image previews -->
                        </div>

                        <!-- Current Multi Image Display -->
                        <div class="col-6 col-lg-5 mb-3">
                            <label for="" class="mb-2">Current Multi Image</label>
                            <div>
                                @foreach ($multiImages as $multiImage)
                                    <div class="multi-image-item">
                                        <input type="hidden" name="multi_image_id[{{ $multiImage->id }}]"
                                            value="{{ $multiImage->id }}">

                                        <!-- Image Display -->
                                        <img src="{{ url('storage/' . $multiImage->multi_image) }}"
                                            style="width: 80px; height: 80px;" class="me-2 mb-2" alt="Multi Image">

                                        <!-- Input for new image upload -->
                                        <input type="file" name="multi_image[{{ $multiImage->id }}]">

                                        <!-- Delete Checkbox or Button -->
                                        <label>
                                            <input type="checkbox" name="delete_multi_image[{{ $multiImage->id }}]"
                                                value="1">
                                            Delete
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <!-- Submit Button -->
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-outline-primary px-4 rounded-0">Submit
                                Product</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var category_id = $(this).val();

                if (category_id) {
                    $.ajax({
                        url: "{{ url('/get-subcategories') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#subcategory').empty().append(
                                '<option selected disabled>Choose Option...</option>');
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#subcategory').empty().append('<option selected disabled>Choose Option...</option>');
                }
            });
        });
    </script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(document).ready(function() {
            $('input[data-role="tagsinput"]').tagsinput();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Single Image Preview
            const imageInput = document.getElementById("imageInput");
            const imagePreview = document.getElementById("imagePreview");

            imageInput.addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove("d-none");
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Multiple Images Preview
            const multiImageInput = document.getElementById("multiImageInput");
            const multiImagePreview = document.getElementById("multiImagePreview");

            multiImageInput.addEventListener("change", function(event) {
                multiImagePreview.innerHTML = ""; // Clear previous images
                const files = event.target.files;

                if (files.length > 0) {
                    Array.from(files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement("img");
                            img.src = e.target.result;
                            img.classList.add("img-thumbnail");
                            img.style.width = "80px";
                            img.style.height = "80px";
                            multiImagePreview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            });
        });
    </script>


</x-admin-app-layout>
