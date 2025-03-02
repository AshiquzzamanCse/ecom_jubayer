<x-admin-app-layout :title="'Product Create'">
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
                        <li class="breadcrumb-item active" aria-current="page">Create Product</li>
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

        <h6 class="mb-0 text-uppercase">Create Product In Site</h6>
        <hr />

        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-grey text-white">
                <h5 class="mb-0">Add New Product</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3"> <!-- Spacing between fields -->

                        <!-- Status -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select">
                                <option selected disabled>Choose...</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Brand Name -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Brand</label>
                            <select name="brand_id" class="form-select">
                                <option selected disabled>Choose...</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Category -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Category</label>
                            <select name="category_id" class="form-select" id="category">
                                <option selected disabled>Choose...</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SubCategory -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">SubCategory</label>
                            <select name="subcategory_id" class="form-select" id="subcategory">
                                <option selected disabled>Choose...</option>
                            </select>
                        </div>

                        <!-- Product Name -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Product Name</label>
                            <input type="text" class="form-control" required name="name"
                                placeholder="Enter product name" value="{{ old('name') }}">
                        </div>

                        <!-- Code & Qty -->
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Code</label>
                            <input type="text" class="form-control" required name="code" placeholder="Enter code"
                                value="{{ old('code') }}">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Quantity</label>
                            <input type="number" class="form-control" required name="qty"
                                placeholder="Enter quantity" value="{{ old('qty') }}">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Currancy</label>
                            <select name="currancy" class="form-select">
                                <option selected disabled>Choose...</option>
                                <option value="dollar">$</option>
                                <option value="taka">BDT</option>
                            </select>
                        </div>

                        <!-- Prices -->
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Selling Price</label>
                            <input type="number" class="form-control" required name="selling_price"
                                placeholder="Selling price" value="{{ old('selling_price') }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Discount Price</label>
                            <input type="number" class="form-control" name="discount_price"
                                placeholder="Discount price" value="{{ old('discount_price') }}">
                        </div>

                        <!-- Size & Color -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Size (comma separated)</label>
                            <input type="text" class="form-control" name="size" placeholder="e.g., S, M, L, XL"
                                data-role="tagsinput" value="{{ old('size') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Color (comma separated)</label>
                            <input type="text" class="form-control" name="color"
                                placeholder="e.g., Red, Blue, Green" data-role="tagsinput" value="{{ old('color') }}">
                        </div>

                        <!-- Stock -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Stock</label>
                            <select name="stock" class="form-select">
                                <option selected disabled>Choose...</option>
                                <option value="available">Available</option>
                                <option value="stock_out">Stock Out</option>
                            </select>
                        </div>

                        <!-- Textareas -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Short Description</label>
                            <textarea name="short_descp" class="form-control" rows="3" placeholder="Short description">{{ old('short_descp') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Specification</label>
                            <textarea name="specification" class="form-control" rows="3" placeholder="Specifications">{{ old('specification') }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Long Description</label>
                            <textarea name="long_descp" class="editor form-control" rows="5" placeholder="Long description">{!! old('long_descp') !!}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Accessory</label>
                            <textarea name="assecrioes" class="editor form-control" rows="5" placeholder="Accessory">{!! old('assecrioes') !!}</textarea>
                        </div>

                        <!-- Checkboxes -->
                        <div class="col-md-12 mt-3">
                            <label class="form-label fw-semibold">Product Highlights</label>
                            <div class="d-flex gap-3 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hot_deal" value="1"
                                        id="hot_deal" {{ old('hot_deal') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hot_deal">Hot Deal</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1"
                                        id="featured" {{ old('featured') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="best_seeling"
                                        value="1" id="best_seeling" {{ old('best_seeling') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="best_seeling">Best Selling</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="new" value="1"
                                        id="new" {{ old('new') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="new">New</label>
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Product Image</label>
                            <input type="file" class="form-control" name="image" id="imageInput"
                                accept="image/*">
                            <img id="imagePreview" src="#" alt="Preview" class="mt-2 img-thumbnail d-none"
                                width="150">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Additional Images</label>
                            <input type="file" class="form-control" name="multi_image[]" id="multiImageInput"
                                multiple accept="image/*">
                            <div id="multiImagePreview" class="mt-2 d-flex flex-wrap gap-2"></div>
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
