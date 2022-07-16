<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PayPal\Test\RestApi\_fixtures\TestStruct;

use Swag\PayPal\RestApi\PayPalApiStruct;

class Foo extends PayPalApiStruct
{
    /**
     * @var string
     */
    protected $fooBaz;

    protected function setFooBaz(string $fooBaz): void
    {
        $this->fooBaz = $fooBaz;
    }
}
