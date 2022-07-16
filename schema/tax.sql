CREATE TABLE `tax` (
    `id` BINARY(16) NOT NULL,
    `tax_rate` DOUBLE NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `custom_fields` JSON NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.tax.custom_fields` CHECK (JSON_VALID(`custom_fields`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tax_rule` (
    `id` BINARY(16) NOT NULL,
    `tax_rule_type_id` BINARY(16) NOT NULL,
    `country_id` BINARY(16) NOT NULL,
    `tax_rate` DOUBLE NOT NULL,
    `data` JSON NULL,
    `tax_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.tax_rule.data` CHECK (JSON_VALID(`data`)),
    KEY `fk.tax_rule.tax_rule_type_id` (`tax_rule_type_id`),
    KEY `fk.tax_rule.country_id` (`country_id`),
    KEY `fk.tax_rule.tax_id` (`tax_id`),
    CONSTRAINT `fk.tax_rule.tax_rule_type_id` FOREIGN KEY (`tax_rule_type_id`) REFERENCES `tax_rule_type` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.tax_rule.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.tax_rule.tax_id` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tax_rule_type` (
    `id` BINARY(16) NOT NULL,
    `technical_name` VARCHAR(255) NOT NULL,
    `position` INT(11) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.tax_rule_type.translated` CHECK (JSON_VALID(`translated`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tax_rule_type_translation` (
    `type_name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `tax_rule_type_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`tax_rule_type_id`,`language_id`),
    KEY `fk.tax_rule_type_translation.tax_rule_type_id` (`tax_rule_type_id`),
    KEY `fk.tax_rule_type_translation.language_id` (`language_id`),
    CONSTRAINT `fk.tax_rule_type_translation.tax_rule_type_id` FOREIGN KEY (`tax_rule_type_id`) REFERENCES `tax_rule_type` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.tax_rule_type_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;