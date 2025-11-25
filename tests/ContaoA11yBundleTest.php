<?php

declare(strict_types=1);

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Weba11y\ContaoA11yBundle\Tests;

use Weba11y\ContaoA11yBundle\ContaoA11yBundle;
use PHPUnit\Framework\TestCase;

class ContaoA11yBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoSkeletonBundle();

        $this->assertInstanceOf('Contao\SkeletonBundle\ContaoSkeletonBundle', $bundle);
    }
}
