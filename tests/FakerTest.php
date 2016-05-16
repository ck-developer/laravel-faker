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

/**
 * Class FakerTest
 */
class FakerTest extends TestCase
{
    /**
     * @var \Faker\Generator;
     */
    protected $faker;

    public function setUp()
    {
        parent::setUp();

        $this->faker = $this->app->make(\Ck\Laravel\Faker\Faker::class)->create();
    }

    public function testFaker()
    {
        $this->assertInternalType('string', $this->faker->title);
    }

    public function testFakerProvider()
    {
        $this->assertInternalType('string', $this->faker->book);
    }
}
