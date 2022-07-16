CREATE TABLE `app` (
    `id` BINARY(16) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `path` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NULL,
    `copyright` VARCHAR(255) NULL,
    `license` VARCHAR(255) NULL,
    `active` TINYINT(1) NOT NULL DEFAULT '0',
    `configurable` TINYINT(1) NOT NULL DEFAULT '0',
    `privacy` VARCHAR(255) NULL,
    `version` VARCHAR(255) NOT NULL,
    `icon` LONGBLOB NULL,
    `app_secret` VARCHAR(255) NULL,
    `modules` JSON NULL,
    `cookies` JSON NULL,
    `integration_id` BINARY(16) NOT NULL,
    `acl_role_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.app.modules` CHECK (JSON_VALID(`modules`)),
    CONSTRAINT `json.app.cookies` CHECK (JSON_VALID(`cookies`)),
    CONSTRAINT `json.app.translated` CHECK (JSON_VALID(`translated`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `app_translation` (
    `label` VARCHAR(255) NOT NULL,
    `description` LONGTEXT NULL,
    `privacy_policy_extensions` LONGTEXT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `app_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`app_id`,`language_id`),
    KEY `fk.app_translation.app_id` (`app_id`),
    KEY `fk.app_translation.language_id` (`language_id`),
    CONSTRAINT `fk.app_translation.app_id` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.app_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `app_action_button` (
    `id` BINARY(16) NOT NULL,
    `entity` VARCHAR(255) NOT NULL,
    `view` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `action` VARCHAR(255) NOT NULL,
    `open_new_tab` TINYINT(1) NOT NULL DEFAULT '0',
    `app_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.app_action_button.translated` CHECK (JSON_VALID(`translated`)),
    KEY `fk.app_action_button.app_id` (`app_id`),
    CONSTRAINT `fk.app_action_button.app_id` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `app_action_button_translation` (
    `label` VARCHAR(255) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `app_action_button_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`app_action_button_id`,`language_id`),
    KEY `fk.app_action_button_translation.app_action_button_id` (`app_action_button_id`),
    KEY `fk.app_action_button_translation.language_id` (`language_id`),
    CONSTRAINT `fk.app_action_button_translation.app_action_button_id` FOREIGN KEY (`app_action_button_id`) REFERENCES `app_action_button` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.app_action_button_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `app_template` (
    `id` BINARY(16) NOT NULL,
    `template` LONGTEXT NOT NULL,
    `path` VARCHAR(1024) NOT NULL,
    `active` TINYINT(1) NOT NULL DEFAULT '0',
    `app_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.app_template.app_id` (`app_id`),
    CONSTRAINT `fk.app_template.app_id` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;