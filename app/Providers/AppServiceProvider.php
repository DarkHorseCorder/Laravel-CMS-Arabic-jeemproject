<?php

namespace App\Providers;

use App\Http\View\Composers\LayoutComposer;
use App\Http\ViewComposers\LocalizationComposer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // Set the app locale according to the URL
        View::composer('*', LayoutComposer::class);

        Blade::directive('isactiveroute', function ($routeName) {
            return "<?php echo ($routeName == \Route::currentRouteName()) ? 'active' : ''; ?>";
        });
    }
}
