CREATE TABLE `currency` (
    `id` BINARY(16) NOT NULL,
    `factor` DOUBLE NOT NULL,
    `symbol` VARCHAR(255) NOT NULL,
    `iso_code` VARCHAR(255) NOT NULL,
    `decimal_precision` INT(11) NOT NULL,
    `position` INT(11) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.currency.translated` CHECK (JSON_VALID(`translated`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `currency_translation` (
    `short_name` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `custom_fields` JSON NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `currency_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`currency_id`,`language_id`),
    CONSTRAINT `json.currency_translation.custom_fields` CHECK (JSON_VALID(`custom_fields`)),
    KEY `fk.currency_translation.currency_id` (`currency_id`),
    KEY `fk.currency_translation.language_id` (`language_id`),
    CONSTRAINT `fk.currency_translation.currency_id` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.currency_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;