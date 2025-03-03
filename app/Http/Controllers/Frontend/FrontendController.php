<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\MultiImage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Team;
use App\Models\Testimonial;
use Carbon\Carbon;
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
        $brands            = Brand::where('status', 'active')->where('status', 'active')->limit(8)->get();

        $about        = About::where('status', 'active')->latest('id')->first();
        $teams        = Team::where('status', 'active')->latest()->limit('3')->get();
        $testimonials = Testimonial::where('status', 'active')->latest()->limit('5')->get();

        return view('frontend.index', compact('banners', 'about', 'teams', 'testimonials', 'categorys', 'latest_products', 'hot_deal_products', 'featured_products', 'brands'));
    }

    //allProduct
    public function allProduct()
    {
        return view('frontend.pages.product.all_product');
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

    //bestSellingProduct
    public function bestSellingProduct()
    {
        return view('frontend.pages.product.bestselling_product');
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
    public function AddToCartProductHome(Request $request)
    {
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {

            return response()->json(['error' => 'This Product Has Already Added']);
        }

        if ($product->discount_price == null) {

            Cart::add([

                'id'      => $id,

                'name'    => $product->name,
                'qty'     => 1,
                'price'   => $product->selling_price,
                'weight'  => 1,

                'options' => [
                    'image' => $product->image,
                    'color' => $request->color,
                    'size'  => $request->size,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id'      => $id,

                'name'    => $product->name,
                'qty'     => 1,
                'price'   => $product->discount_price,
                'weight'  => 1,

                'options' => [
                    'image' => $product->image,
                    'color' => $request->color,
                    'size'  => $request->size,
                ],

            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    //AddMiniCart
    public function AddMiniCart()
    {

        $carts     = Cart::content();
        $cartQty   = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts'     => $carts,
            'cartQty'   => $cartQty,
            'cartTotal' => $cartTotal,

        ]);
    }

    //RemoveMiniCart
    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }

    //viewCart
    public function viewCart()
    {
        $carts        = Cart::content();
        $cartQty      = Cart::count();
        $cartTotal    = Cart::total();
        $cartSubTotal = Cart::subtotal();

        return view('frontend.pages.cart.view_cart', compact('carts', 'cartQty', 'cartTotal', 'cartSubTotal'));
    }

    //CartIncrement
    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json('Increment');
    }

    //CartDecrement
    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json('Decrement');
    }

    // public function RemoveMiniCart($rowId)
    // {
    //     Cart::remove($rowId);
    //     return response()->json(['success' => 'Product Removed From Cart']);
    // }

    //AddToWishlist
    public function AddToWishlist(Request $request)
    {
        $id      = $request->product_id;
        $product = Product::findOrFail($id);

        $cartItem = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            // Return an error if the product is already in the wishlist
            return response()->json(['error' => 'This Product Has Already Been Added To Your Wishlist']);
        }

        // Add the product to the wishlist
        if ($product->discount_price == null) {
            Cart::instance('wishlist')->add([
                'id'      => $id,
                'name'    => $product->name,
                'qty'     => 1,
                'price'   => $product->selling_price,
                'weight'  => 1,
                'options' => [
                    'image' => $product->image,
                    'stock' => $product->stock,
                ],
            ]);
        } else {
            Cart::instance('wishlist')->add([
                'id'      => $id,
                'name'    => $product->name,
                'qty'     => 1,
                'price'   => $product->discount_price,
                'weight'  => 1,
                'options' => [
                    'image' => $product->image,
                    'stock' => $product->stock,
                ],
            ]);
        }

        // Get the updated wishlist count
        $wishlistCount   = Cart::instance('wishlist')->count();
        $cartWishlistQty = Cart::instance('wishlist')->count();

        // Return the success message and the updated wishlist count
        return response()->json([
            'success'         => 'Successfully Added to Your Wishlist',
            'wishlistCount'   => $wishlistCount,   // Send back the updated count
            'cartWishlistQty' => $cartWishlistQty, // Send back the updated count
        ]);
    }

    //WishlistProduct
    public function WishlistProduct()
    {
        $data = [
            'cartWishlists' => Cart::instance('wishlist')->content(),
        ];
        return view('frontend.pages.wishlist.view_wishlist', $data);
    }

    //GetWishlist
    public function GetWishlist()
    {
        $cartWishlist    = Cart::instance('wishlist')->content(); // Limiting to 3 products
        $cartWishlistQty = Cart::instance('wishlist')->count();
        $cartTotal       = Cart::instance('wishlist')->total();

        return response()->json([
            'cartWishlist'    => $cartWishlist,
            'cartWishlistQty' => $cartWishlistQty,
            'cartTotal'       => $cartTotal,
        ]);
    }

    //removeWishlist
    public function removeWishlist($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Wishlist']);
    }

    //AddToCartDetails
    public function AddToCartDetails(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $color = $request->color; // Get color
        $size  = $request->size;  // Get size

        $price = $product->discount_price ?? $product->selling_price;

        Cart::add([
            'id'      => $id,
            'name'    => $request->name,
            'qty'     => 1,
            'price'   => $price,
            'weight'  => 1,
            'options' => [
                'image' => $product->image,
                'color' => $color,
                'size'  => $size,
            ],
        ]);

        return response()->json(['success' => 'Successfully Added to Your Cart']);
    }

    //checkout
    public function checkout()
    {
        $carts     = Cart::content();
        $cartQty   = Cart::count();
        $cartTotal = Cart::total();

        return view('frontend.pages.checkout.checkout', compact('carts', 'cartQty', 'cartTotal'));
    }

    public function checkoutStore(Request $request)
    {
        //dd($request->all());

        // $admin = Admin::where('status', 1)->get();

        $order_id = Order::insertGetId([

            // 'user_id' => Auth::id(),

            'billing_name'           => $request->billing_name,
            'billing_address_line1'  => $request->billing_address_line1,
            'billing_address_line2'  => $request->billing_address_line2,
            'billing_city'           => $request->billing_city,
            'billing_state'          => $request->billing_state,
            'billing_postal_code'    => $request->billing_postal_code,
            'billing_country'        => $request->billing_country,
            'billing_phone'          => $request->billing_phone,
            'billing_email'          => $request->billing_email,
            'notes'                  => $request->notes,

            'shipping_name'          => $request->shipping_name,
            'shipping_phone'         => $request->shipping_phone,
            'shipping_city'          => $request->shipping_city,
            'shipping_state'         => $request->shipping_state,
            'shipping_postal_code'   => $request->shipping_postal_code,
            'shipping_country'       => $request->shipping_country,
            'shipping_address_line1' => $request->shipping_address_line1,
            'shipping_address_line2' => $request->shipping_address_line2,

            'shipping_charge'        => $request->shipping_charge,
            'payment_method'         => 'Cash On Delivery',
            'transaction_number'     => 'Cash On Delivery',
            'total_amount'           => $request->total_amount,

            'invoice_number'         => 'DV' . mt_rand(10000000, 99999999),
            // 'order_number' => Helper::generateOrderNumber(),

            'order_date'             => Carbon::now()->format('d F Y'),
            'order_month'            => Carbon::now()->format('F'),
            'order_year'             => Carbon::now()->format('Y'),

            'created_at'             => Carbon::now(),

        ]);

        //Send Mail
        // $invoice = Order::findOrFail($order_id);

        // $data = [

        //     'invoice_number'        => $invoice->invoice_number,
        //     'total_amount'          => $invoice->total_amount,
        //     'billing_name'          => $invoice->billing_name,
        //     'billing_email'         => $invoice->billing_email,
        //     'billing_phone'         => $invoice->billing_phone,
        //     'billing_address_line1' => $invoice->billing_address_line1,

        // ];

        // Mail::to($request->billing_email)->send(new OrderMail($data));
        //End Send Mail

        //Notification
        // Notification::send($admin, new OrderComplete($request->billing_name));
        //Notification

        $carts = Cart::content();

        foreach ($carts as $cart) {

            OrderItem::insert([
                'order_id'   => $order_id,
                'product_id' => $cart->id,
                'color'      => $cart->options->color,
                'qty'        => $cart->qty,
                'price'      => $cart->price,
                'created_at' => now(),

            ]);
        } // End Foreach

        Cart::destroy();

        // toastr()->success('Order Successfully');

        return redirect()->route('index');
    }

}
