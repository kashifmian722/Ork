<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class ServiceBooking extends Plugin
{
    public function uninstall(UninstallContext $uninstallContext): void
    {
        /** @var Connection $connection */
        $connection = $this->container->get(Connection::class);

        $connection->executeUpdate('DROP TABLE IF EXISTS `swag_service_booking_date`, `swag_service_booking_template`;');
    }
}
