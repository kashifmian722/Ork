CREATE TABLE `webhook` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `event_name` VARCHAR(500) NOT NULL,
    `url` VARCHAR(500) NOT NULL,
    `app_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.webhook.app_id` (`app_id`),
    CONSTRAINT `fk.webhook.app_id` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;