<?php declare(strict_types=1);
namespace SwagBasicExample\Migration;
use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1619596186ExampleDescription extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1619596186;
    }

    public function update(Connection $connection): void
    {
         $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `swag_example` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `type` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `first_name` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `email` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `name` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `phone` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
    `created_at` DATETIME(3) NOT NULL,
    `pick_date` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3),
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8mb4
    COLLATE = utf8mb4_unicode_ci;
SQL;
        $connection->executeStatement($sql);
    }

    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
