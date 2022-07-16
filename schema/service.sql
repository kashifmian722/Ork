CREATE TABLE `service` (
    `id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.service.translated` CHECK (JSON_VALID(`translated`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `service_translation` (
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `service_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`service_id`,`language_id`),
    KEY `fk.service_translation.service_id` (`service_id`),
    KEY `fk.service_translation.language_id` (`language_id`),
    CONSTRAINT `fk.service_translation.service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.service_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;