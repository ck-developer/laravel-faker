<?php

/*
 * This file is part of the Laravel Faker package.
 *
 * (c) Claude Khedhiri <claude@khedhiri.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ck\Laravel\Faker\Providers;

use Illuminate\Support\ServiceProvider;
use Ck\Laravel\Faker\Faker;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Booting
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/faker.php';

        $this->mergeConfigFrom($configPath, 'faker');

        $this->publishes(array(
            $configPath => config_path('faker.php')
        ), 'faker');
    }

    /**
     * Register the commands
     *
     * @return void
     */
    public function register()
    {
        $this->registerFaker();
    }

    protected function registerFaker()
    {
        $this->app->singleton('faker', function ($app) {
            return new Faker($app->make('config'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(
            'faker',
        );
    }
}
