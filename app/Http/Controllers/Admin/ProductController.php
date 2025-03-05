<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function getSubcategories($category_id)
    {
        $subcategories = SubCategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::latest()->get();
        return view('admin.pages.product.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [

            'brands'       => Brand::where('status', 'active')->latest()->get(),
            'categorys'    => Category::where('status', 'active')->latest()->get(),
            'subcategorys' => SubCategory::where('status', 'active')->latest()->get(),

        ];
        return view('admin.pages.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'image'         => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Single image validation
            'multi_image[]' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Multi image validation for each image
        ]);

        $uploadedFiles = [];
        $multiImages   = [];

        // Array of files to upload
        $files = [
            'image'       => $request->file('image'),
            'multi_image' => $request->file('multi_image'), // Multi images field
        ];

        // Handle single image upload
        foreach (['image'] as $key) {
            $file = $files[$key];

            if ($file) {
                $filePath            = 'product/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Handle multiple image uploads
        if ($files['multi_image']) {
            foreach ($files['multi_image'] as $file) {
                if ($file) {
                    $filePath     = 'product/multi_image'; // Change path as needed
                    $uploadResult = newUpload($file, $filePath);

                    if ($uploadResult['status'] === 0) {
                        return redirect()->back()->with('error', $uploadResult['error_message']);
                    }

                    $multiImages[] = $uploadResult['file_path']; // Save file path to array
                }
            }
        }

        // Store the product data
        $product = Product::create([

            'name'           => $request->name,
            'short_descp'    => $request->short_descp,
            'long_descp'     => $request->long_descp,

            'specification'  => $request->specification,
            'assecrioes'     => $request->assecrioes,
            'brand_id'       => $request->brand_id,
            'category_id'    => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,

            'code'           => $request->code,
            'qty'            => $request->qty,
            'currancy'       => $request->currancy,
            'selling_price'  => $request->selling_price,
            'discount_price' => $request->discount_price,
            'size'           => $request->size,
            'color'          => $request->color,
            'stock'          => $request->stock,
            'hot_deal'       => $request->hot_deal,
            'featured'       => $request->featured,
            'best_seeling'   => $request->best_seeling,
            'new'            => $request->new,

            'status'         => $request->status,

            'image'          => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
        ]);

        // Store each multi image as a separate record in the MultiImage table
        foreach ($multiImages as $imagePath) {
            MultiImage::create([
                'product_id'  => $product->id,
                'multi_image' => $imagePath, // Save the file path for each image
            ]);
        }

        return redirect()->route('admin.product.index')->with('success', 'Data Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Product::findOrFail($id);

        $brands    = Brand::where('status', 'active')->latest()->get();
        $categorys = Category::where('status', 'active')->latest()->get();
        // Get subcategories based on selected category
        $subcategories = SubCategory::where('category_id', $item->category_id)
            ->where('status', 'active')
            ->latest()
            ->get();

        $multiImages = MultiImage::where('product_id', $id)->get(); // Fetch related multi images
        return view('admin.pages.product.edit', compact('item', 'multiImages', 'categorys', 'subcategories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $item = Product::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];
        $multiImages   = [];

        // Single image handling
        $files = [
            'image'       => $request->file('image'),
            'multi_image' => $request->file('multi_image'), // Multi-image files
        ];

        // Handle single image upload
        foreach (['image'] as $key) {
            $file = $files[$key];

            if ($file) {
                // Define file path for single image
                $filePath = 'product/' . $key;
                $oldFile  = $item->$key ?? null;

                // Delete old image if it exists
                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }

                // Upload the new file
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                // If no new file is uploaded, retain old file path
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Handle multi-image deletion
        if ($request->has('delete_multi_image')) {
            foreach ($request->input('delete_multi_image') as $multiImageId => $value) {
                $multiImage = MultiImage::where('id', $multiImageId)->where('product_id', $item->id)->first();
                if ($multiImage) {
                    // Delete the old file from storage
                    Storage::delete("public/" . $multiImage->multi_image);

                    // Delete the multi-image record from the database
                    $multiImage->delete();
                }
            }
        }

        // Handle multi-image upload or update
        if ($request->hasFile('multi_image')) {
            foreach ($request->file('multi_image') as $index => $file) {
                $multiImageId = $request->input("multi_image_id.{$index}");

                if ($multiImageId) {
                    // Update existing multi-image
                    $existingMultiImage = MultiImage::where('id', $multiImageId)->where('product_id', $item->id)->first();
                    if ($existingMultiImage) {
                        // Delete the old file from storage
                        Storage::delete("public/" . $existingMultiImage->multi_image);

                        // Upload the new file
                        $filePath     = 'product/multi_image';
                        $uploadResult = newUpload($file, $filePath);

                        if ($uploadResult['status'] === 0) {
                            return redirect()->back()->with('error', $uploadResult['error_message']);
                        }

                        // Update the multi-image record with the new file path
                        $existingMultiImage->update([
                            'multi_image' => $uploadResult['file_path'],
                        ]);
                    }
                } else {
                    // Handle the new multi-image upload
                    $filePath     = 'product/multi_image';
                    $uploadResult = newUpload($file, $filePath);

                    if ($uploadResult['status'] === 0) {
                        return redirect()->back()->with('error', $uploadResult['error_message']);
                    }

                    // Create the new multi-image record
                    MultiImage::create([
                        'product_id'  => $item->id,
                        'multi_image' => $uploadResult['file_path'],
                    ]);
                }
            }
        }

        // Update the product data with new or existing values
        $item->update([

            'name'           => $request->name,
            'short_descp'    => $request->short_descp,
            'long_descp'     => $request->long_descp,

            'specification'  => $request->specification,
            'assecrioes'     => $request->assecrioes,
            'brand_id'       => $request->brand_id,
            'category_id'    => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,

            'code'           => $request->code,
            'qty'            => $request->qty,
            'currancy'       => $request->currancy,
            'selling_price'  => $request->selling_price,
            'discount_price' => $request->discount_price,
            'size'           => $request->size,
            'color'          => $request->color,
            'stock'          => $request->stock,
            'hot_deal'       => $request->hot_deal,
            'featured'       => $request->featured,
            'best_seeling'   => $request->best_seeling,
            'new'            => $request->new,

            'status'         => $request->status,

            'image'          => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $item->image,
        ]);

        // Return to the product index page with a success message
        return redirect()->route('admin.product.index')->with('success', 'Data Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the main image if it exists
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Delete all associated multi-images if they exist
        $multiImages = MultiImage::where('product_id', $id)->get();
        foreach ($multiImages as $multiImage) {
            // Delete each multi-image from storage
            if ($multiImage->multi_image) {
                Storage::delete('public/' . $multiImage->multi_image);
            }

            // Delete the multi-image record from the database
            $multiImage->delete();
        }

        // Delete the product record from the database
        $product->delete();

        // Redirect with a success message
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully!');
    }
}
