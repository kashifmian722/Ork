CREATE TABLE `organization` (
    `id` BINARY(16) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(1024) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NULL,
    `city` VARCHAR(255) NULL,
    `post_code` VARCHAR(255) NULL,
    `imprint` LONGTEXT NULL,
    `tos` LONGTEXT NULL,
    `privacy` LONGTEXT NULL,
    `logo_id` BINARY(16) NULL,
    `home_hero_image_id` BINARY(16) NULL,
    `home_text` LONGTEXT NULL,
    `sales_channel_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `organization_access_token` (
    `id` BINARY(16) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `organization_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.organization_access_token.organization_id` (`organization_id`),
    CONSTRAINT `fk.organization_access_token.organization_id` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `organization_reset_password` (
    `id` BINARY(16) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `organization_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.organization_reset_password.organization_id` (`organization_id`),
    CONSTRAINT `fk.organization_reset_password.organization_id` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `organization_disclaimer` (
    `id` BINARY(16) NOT NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `text` VARCHAR(255) NULL,
    `image_id` BINARY(16) NULL,
    `organization_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;