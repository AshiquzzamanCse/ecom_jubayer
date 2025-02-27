<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\Team;
use App\Models\Testimonial;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index()
    {
        $banners           = Banner::where('status', 'active')->latest()->get();
        $categorys         = Category::where('status', 'active')->latest()->limit(7)->get();
        $latest_products   = Product::where('status', 'active')->latest('id')->limit(20)->get();
        $hot_deal_products = Product::where('status', 'active')->where('hot_deal', 1)->limit(20)->get();
        $featured_products = Product::where('status', 'active')->where('featured', 1)->limit(10)->get();

        $about        = About::where('status', 'active')->latest('id')->first();
        $teams        = Team::where('status', 'active')->latest()->limit('3')->get();
        $testimonials = Testimonial::where('status', 'active')->latest()->limit('5')->get();

        return view('frontend.index', compact('banners', 'about', 'teams', 'testimonials', 'categorys', 'latest_products', 'hot_deal_products', 'featured_products'));
    }

    public function productDetails($slug)
    {
        // Fetch the product by its slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Fetch associated images for the product using the product's id
        $multiImages = MultiImage::where('product_id', $product->id)->get();
        $sizes       = explode(',', $product->size);
        $colors      = explode(',', $product->color);

        // Pass the product and the images to the view
        return view('frontend.pages.product.product_details', compact('product', 'multiImages', 'sizes', 'colors'));
    }

    //All Team
    // public function allTeam()
    // {
    //     $teams = Team::where('status', 'active')->latest()->get();
    //     return view('frontend.pages.allteam', compact('teams'));
    // }

    //project Show
    // public function projectShow($slug)
    // {
    //     // $project = Project::where('slug', $slug)->firstOrFail();
    //     $multiImages = MultiImage::where('project_id', $project->id)->get();

    //     return view('frontend.pages.project_show', compact('project', 'multiImages'));
    // }

    //All Contact
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    //contactStore
    public function contactStore(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:150',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string|max:1200',
            // 'g-recaptcha-response' => 'required|captcha', // Validate reCAPTCHA
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
                                 // Generate a unique message code
            $typePrefix = 'MSG'; // Adjust this as needed
            $today      = date('dmy');
            $lastCode   = Contact::where('code', 'like', $typePrefix . '-' . $today . '%')
                ->orderBy('id', 'desc')
                ->first();

            $newNumber = $lastCode ? (int) explode('-', $lastCode->code)[2] + 1 : 1;
            $code      = $typePrefix . '-' . $today . '-' . $newNumber;

            // Create a new contact object
            $contact = new Contact([
                'code'    => $code,
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Save the contact record
            $contact->save();

            // Commit the transaction
            DB::commit();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Thank you! We have received your message and will contact you soon.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Catch database-related exceptions specifically
            DB::rollBack();
            Log::error('Database Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue saving your message. Please try again later.');
        } catch (\Exception $e) {
            // Catch all other general exceptions
            DB::rollBack();
            Log::error('General Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was an issue processing your request. Please try again later.');
        }
    }

    //AddToCartProductHome
    // public function AddToCartProductHome(Request $request)
    // {
    //     $id = $request->product_id;

    //     $product = Product::findOrFail($id);

    //     $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
    //         return $cartItem->id === $id;
    //     });

    //     if ($cartItem->isNotEmpty()) {

    //         return response()->json(['error' => 'This Product Has Already Added']);
    //     }

    //     if ($product->discount_price == null) {

    //         Cart::add([

    //             'id'      => $id,

    //             'name'    => $product->name,
    //             'qty'     => 1,
    //             'price'   => $product->selling_price,
    //             'weight'  => 1,

    //             'options' => [
    //                 'image' => $product->image,
    //                 // 'color' => $request->color,
    //             ],

    //         ]);

    //         return response()->json(['success' => 'Successfully Added on Your Cart']);
    //     } else {

    //         Cart::add([

    //             'id'      => $id,

    //             'name'    => $product->name,
    //             'qty'     => 1,
    //             'price'   => $product->discount_price,
    //             'weight'  => 1,

    //             'options' => [
    //                 'image' => $product->image,
    //                 // 'color' => $request->color,
    //             ],

    //         ]);

    //         return response()->json(['success' => 'Successfully Added on Your Cart']);
    //     }
    // }

    public function AddToCartProductHome(Request $request)
    {
        $id      = $request->product_id;
        $product = Product::findOrFail($id);

        // Check if product has a discount price
        if ($product->discount_price == null) {
            Cart::add([
                'id'      => $id,
                'name'    => $product->name,
                'qty'     => 1,
                'price'   => $product->selling_price,
                'weight'  => 1,
                'options' => [
                    'image' => $product->image,
                ],
            ]);
        } else {
            Cart::add([
                'id'      => $id,
                'name'    => $product->name,
                'qty'     => 1,
                'price'   => $product->discount_price,
                'weight'  => 1,
                'options' => [
                    'image' => $product->image,
                ],
            ]);
        }

        // Get the current cart count
        $cartCount = Cart::count();

        // Return the response with cart count and success message
        return response()->json([
            'success'    => 'Successfully Added to Your Cart',
            'cart_count' => $cartCount, // Pass the updated cart count
        ]);
    }

    public function viewCart()
    {
        $carts   = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return view('frontend.pages.cart.view_cart', compact('carts', 'cartQty','cartTotal'));
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Removed From Cart']);
    }

}
