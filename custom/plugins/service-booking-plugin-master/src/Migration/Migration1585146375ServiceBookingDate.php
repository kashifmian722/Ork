<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\ServiceBooking\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1585146375ServiceBookingDate extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1585146375;
    }

    public function update(Connection $connection): void
    {
        $connection->executeUpdate('
CREATE TABLE IF NOT EXISTS `swag_service_booking_date` (
    `id`                                   BINARY(16)             NOT NULL,
    `template_id`                          BINARY(16)             NOT NULL,
    `start`                                DATETIME(3)            NOT NULL,
    `end`                                  DATETIME(3)            NOT NULL,
    `created_at`                           DATETIME(3)            NOT NULL,
    `updated_at`                           DATETIME(3)            NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk.swag_service_booking_date.template_id` FOREIGN KEY (`template_id`)
        REFERENCES `swag_service_booking_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
