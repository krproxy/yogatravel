<?php

namespace App\Providers;

use BW\Vkontakte;
use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('BW\Vkontakte', function () {
            return new Vkontakte([
                'client_id' => '5077814',
                'client_secret' => 'YSTQ59AAxjL4XgDQiaGo',
                'redirect_uri' => 'http://yogatravel.guru/vk/callback',
                'scope' => ['email', 'wall '],
            ]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
