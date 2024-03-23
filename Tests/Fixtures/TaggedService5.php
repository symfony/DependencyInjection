<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DependencyInjection\Tests\Fixtures;

use Symfony\Component\DependencyInjection\Tests\Fixtures\Attribute\CustomChildAttribute;

#[CustomChildAttribute]
final class TaggedService5
{
    #[CustomChildAttribute]
    public string $name;

    public function __construct(
        #[CustomChildAttribute]
        private string $param1,
    ) {}

    #[CustomChildAttribute]
    public function fooAction(
        #[CustomChildAttribute]
        string $param1
    ) {}
}
