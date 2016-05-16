<?php

/*
 * This file is part of the Laravel Faker package.
 *
 * (c) Claude Khedhiri <claude@khedhiri.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ck\Test\Laravel\Faker\Providers;

use Faker\Provider\Base;

/**
 * Class Book
 *
 * @property $book;
 */
class Book extends Base
{
    public function book($nbWords = 5)
    {
        $sentence = $this->generator->sentence($nbWords);

        return substr($sentence, 0, strlen($sentence) - 1);
    }
}
