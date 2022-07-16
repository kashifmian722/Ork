<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1585145354ServiceBookingTemplate extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1585145354;
    }

    public function update(Connection $connection): void
    {
        $connection->executeUpdate('
CREATE TABLE IF NOT EXISTS `swag_service_booking_template` (
    `id`                BINARY(16)                              NOT NULL,
    `product_id`        BINARY(16)                              NOT NULL,
    `type`              VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`        DATETIME(3)                             NOT NULL,
    `updated_at`        DATETIME(3)                             NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk.swag_service_booking_template.product_id` FOREIGN KEY (`product_id`)
        REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}

