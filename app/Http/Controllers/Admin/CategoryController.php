<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Category::latest()->get();
        return view('admin.pages.category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'logo' => $request->file('logo'),
            'image' => $request->file('image'),
            'banner_image' => $request->file('banner_image'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'category/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Create the event in the database
        Category::create([

            'name' => $request->name,
            'status' => $request->status,

            'logo' => $uploadedFiles['logo']['status'] == 1 ? $uploadedFiles['logo']['file_path'] : null,
            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
            'banner_image' => $uploadedFiles['banner_image']['status'] == 1 ? $uploadedFiles['banner_image']['file_path'] : null,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Data Inserted Successfully!');
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
        $item = Category::findOrFail($id);
        return view('admin.pages.category.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = Category::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'logo' => $request->file('logo'),
            'image' => $request->file('image'),
            'banner_image' => $request->file('banner_image'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'category/' . $key;
                $oldFile = $item->$key ?? null;

                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Update the item with new values
        $item->update([

            'name' => $request->name,
            'status' => $request->status,

            'logo' => $uploadedFiles['logo']['status'] == 1 ? $uploadedFiles['logo']['file_path'] : $item->logo,
            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $item->image,
            'banner_image' => $uploadedFiles['banner_image']['status'] == 1 ? $uploadedFiles['banner_image']['file_path'] : $item->banner_image,

        ]);

        return redirect()->route('admin.category.index')->with('success', 'Data Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Category::findOrFail($id);

        $files = [
            'logo' => $item->logo,
            'image' => $item->image,
            'banner_image' => $item->banner_image,
        ];
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $oldFile = $item->$key ?? null;
                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
            }
        }
        $item->delete();

        return redirect()->route('admin.category.index')->with('success', 'Data Delete Successfully!!');
    }
}
