CREATE TABLE `custom_field` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `config` JSON NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `set_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.custom_field.config` CHECK (JSON_VALID(`config`)),
    KEY `fk.custom_field.set_id` (`set_id`),
    CONSTRAINT `fk.custom_field.set_id` FOREIGN KEY (`set_id`) REFERENCES `custom_field_set` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `custom_field_set` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `config` JSON NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `global` TINYINT(1) NULL DEFAULT '0',
    `position` INT(11) NULL,
    `app_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.custom_field_set.config` CHECK (JSON_VALID(`config`)),
    KEY `fk.custom_field_set.app_id` (`app_id`),
    CONSTRAINT `fk.custom_field_set.app_id` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `custom_field_set_relation` (
    `id` BINARY(16) NOT NULL,
    `set_id` BINARY(16) NOT NULL,
    `entity_name` VARCHAR(63) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.custom_field_set_relation.set_id` (`set_id`),
    CONSTRAINT `fk.custom_field_set_relation.set_id` FOREIGN KEY (`set_id`) REFERENCES `custom_field_set` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;