<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// tambahan format rupiah
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
        // Script untuk Format Rupiah
        Blade::directive('matauang', function ( $expression ) { 
            return "<?php echo number_format($expression, 2, ',', '.'); ?>";
            /** return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; */
        });
    }
}
