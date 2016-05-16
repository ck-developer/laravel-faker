<?php

/*
 * This file is part of the Laravel Faker package.
 *
 * (c) Claude Khedhiri <claude@khedhiri.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ck\Laravel\Faker;

use Illuminate\Config\Repository as Config;

class Faker
{
    /**
     * @var string
     */
    private $locale;

    /**
     * Faker constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->locale = $config->get('faker.locale');
        $this->seed = $config->get('faker.seed');
        $this->providers = $config->get('faker.providers');
    }

    public function create()
    {
        $faker = \Faker\Factory::create($this->locale);
        $faker->seed($this->seed);

        foreach ($this->providers as $provider) {
            $faker->addProvider(new $provider($faker));
        }

        return $faker;
    }
}
