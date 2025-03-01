<?php
namespace App\Providers;

use App\Models\HomePage;
use App\Models\Meta;
use App\Models\Setting;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::share('setting', null);
        View::share('homepage', null);
        View::share('meta', null);

        try {
            // Check for table existence and set actual values
            if (Schema::hasTable('settings')) {
                View::share('setting', Setting::first());
            }

            if (Schema::hasTable('homepages')) {
                View::share('homepage', HomePage::first());
            }

            if (Schema::hasTable('metas')) {
                View::share('meta', Meta::first());
            }
        } catch (Exception $e) {
            // Log the exception if needed for debugging
            // Log::error('Error loading settings, homepage, or meta: ' . $e->getMessage());
        }

        Paginator::useBootstrap();

        Schema::defaultStringLength(191);
    }
}
