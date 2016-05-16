<?php

/*
 * This file is part of the Laravel Faker package.
 *
 * (c) Claude Khedhiri <claude@khedhiri.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ck\Test\Laravel\Faker;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->make('config')->set('faker', array(
            'locale' => 'en_US',
            'seed'   => 1,
            'providers' => array(
                \Ck\Test\Laravel\Faker\Providers\Book::class
            )
        ));
    }

    /**
     * Get Laravel Maintenance package providers.
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return array(\Ck\Laravel\Faker\Providers\FakerServiceProvider::class);
    }
}
