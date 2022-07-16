<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PayPal\Pos\Api\Error;

use Swag\PayPal\Pos\Api\Common\PosStruct;

class PosTokenError extends PosStruct
{
    /**
     * @var string
     */
    protected $error;

    /**
     * @var string
     */
    protected $errorDescription;

    public function getError(): string
    {
        return $this->error;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    public function getErrorDescription(): string
    {
        return $this->errorDescription;
    }

    public function setErrorDescription(string $errorDescription): void
    {
        $this->errorDescription = $errorDescription;
    }
}
