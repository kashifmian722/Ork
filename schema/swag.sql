CREATE TABLE `swag_example` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NULL,
    `first_name` VARCHAR(255) NULL,
    `phone` VARCHAR(255) NULL,
    `email` VARCHAR(255) NULL,
    `type` VARCHAR(255) NULL,
    `pick_date` VARCHAR(255) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;