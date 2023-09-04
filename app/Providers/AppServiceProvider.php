<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


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
    public function boot()
    {
        Blade::directive('admin', function () {
            return "<?php if(auth()->check() && auth()->user()->permission_id == config('app.userproject_Admin')): ?>";
        });
        Blade::directive('perform', function () {
            return "<?php if(auth()->check() && auth()->user()->permission_id == config('app.userproject_Userperform')): ?>";
        });
        Blade::directive('moniter', function () {
            return "<?php if(auth()->check() && auth()->user()->permission_id == config('app.userproject_Usermoniter')): ?>";
        });

        Blade::directive('end', function () {
            return '<?php endif; ?>';
        });

    }
}
