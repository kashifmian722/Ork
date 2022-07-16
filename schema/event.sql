CREATE TABLE `event_action` (
    `id` BINARY(16) NOT NULL,
    `event_name` VARCHAR(500) NOT NULL,
    `action_name` VARCHAR(500) NOT NULL,
    `config` JSON NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `title` VARCHAR(500) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.event_action.config` CHECK (JSON_VALID(`config`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `event_action_rule` (
    `event_action_id` BINARY(16) NOT NULL,
    `rule_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`event_action_id`,`rule_id`),
    KEY `fk.event_action_rule.event_action_id` (`event_action_id`),
    KEY `fk.event_action_rule.rule_id` (`rule_id`),
    CONSTRAINT `fk.event_action_rule.event_action_id` FOREIGN KEY (`event_action_id`) REFERENCES `event_action` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.event_action_rule.rule_id` FOREIGN KEY (`rule_id`) REFERENCES `rule` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `event_action_sales_channel` (
    `event_action_id` BINARY(16) NOT NULL,
    `sales_channel_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`event_action_id`,`sales_channel_id`),
    KEY `fk.event_action_sales_channel.event_action_id` (`event_action_id`),
    KEY `fk.event_action_sales_channel.sales_channel_id` (`sales_channel_id`),
    CONSTRAINT `fk.event_action_sales_channel.event_action_id` FOREIGN KEY (`event_action_id`) REFERENCES `event_action` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.event_action_sales_channel.sales_channel_id` FOREIGN KEY (`sales_channel_id`) REFERENCES `sales_channel` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;