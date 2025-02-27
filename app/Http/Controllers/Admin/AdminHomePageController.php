<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminHomePageController extends Controller
{
    public function index()
    {
        return view('admin.pages.homepage.index', ['homepage' => HomePage::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateOrcreateHomePage(Request $request)
    {
        $currentSetting = HomePage::first();

        $dataToUpdateOrCreate = [

            'homepage_banner_one_title' => $request->homepage_banner_one_title,
            'homepage_banner_one_badge' => $request->homepage_banner_one_badge,
            'homepage_banner_one_url' => $request->homepage_banner_one_url,

            'homepage_banner_two_title' => $request->homepage_banner_two_title,
            'homepage_banner_two_badge' => $request->homepage_banner_two_badge,
            'homepage_banner_two_url' => $request->homepage_banner_two_url,

            'homepage_feature_one' => $request->homepage_feature_one,
            'homepage_feature_two' => $request->homepage_feature_two,
            'homepage_feature_three' => $request->homepage_feature_three,


        ];

        if ($request->hasFile('homepage_banner_one_image')) {
            $siteLogoPath = handaleFileUpload($request->file('homepage_banner_one_image'), 'homepages');

            if ($siteLogoPath) {
                // check if there's an existing site logo and delete it
                if ($currentSetting && $currentSetting->homepage_banner_one_image) {
                    $existingSiteLogo = storage_path('app/public/' . $currentSetting->homepage_banner_one_image);
                    if (File::exists($existingSiteLogo)) {
                        File::delete($existingSiteLogo);
                    }
                }
                $dataToUpdateOrCreate['homepage_banner_one_image'] = $siteLogoPath;
            }
        }

        if ($request->hasFile('homepage_banner_two_image')) {
            $siteFaviconPath = handaleFileUpload($request->file('homepage_banner_two_image'), 'homepages');

            if ($siteFaviconPath) {
                // check if there's an existing site logo and delete it
                if ($currentSetting && $currentSetting->homepage_banner_two_image) {
                    $existingSiteLogo = storage_path('app/public/' . $currentSetting->homepage_banner_two_image);
                    if (File::exists($existingSiteLogo)) {
                        File::delete($existingSiteLogo);
                    }
                }
                $dataToUpdateOrCreate['homepage_banner_two_image'] = $siteFaviconPath;
            }
        }

        $setting = HomePage::updateOrCreate([], $dataToUpdateOrCreate);

        return redirect()->route('admin.homepages.index')->with('success', 'Data Created Or Update Successfully!!');
    }
}
