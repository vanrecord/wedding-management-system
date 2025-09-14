<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; 

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
    public function boot(\Illuminate\Contracts\Routing\UrlGenerator $url)
    {info(env('APP_ENV')); info('appservice');
        if (env('APP_ENV') !== 'local') { info(999);
            URL::forceScheme('https');
        }
    }
}
