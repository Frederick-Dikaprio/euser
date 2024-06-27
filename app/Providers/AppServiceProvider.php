<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        $url = config('app.url');
        URL::forceRootUrl($url);

        View::composer('*', function ($view) {
            if ($token = session('tokens')) {
                $response = Http::withToken($token['value'])
                    ->get(env('E_USER_API') . '/api/v1/user/profile')
                    ->json();
                if (isset($response['data']['user'])) {
                    $user = $response['data']['user'];
                    $view->with('user', $user);
                };
            }
        });
    }
}
