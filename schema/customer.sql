CREATE TABLE `customer` (
    `id` BINARY(16) NOT NULL,
    `customer_group_id` BINARY(16) NOT NULL,
    `default_payment_method_id` BINARY(16) NOT NULL,
    `sales_channel_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    `last_payment_method_id` BINARY(16) NULL,
    `default_billing_address_id` BINARY(16) NOT NULL,
    `default_shipping_address_id` BINARY(16) NOT NULL,
    `auto_increment` INT(11) NULL,
    `customer_number` VARCHAR(255) NOT NULL,
    `salutation_id` BINARY(16) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `company` VARCHAR(255) NULL,
    `password` VARCHAR(1024) NULL,
    `email` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NULL,
    `affiliate_code` VARCHAR(255) NULL,
    `campaign_code` VARCHAR(255) NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `doubleOptInRegistration` TINYINT(1) NULL DEFAULT '0',
    `doubleOptInEmailSentDate` DATETIME(3) NULL,
    `doubleOptInConfirmDate` DATETIME(3) NULL,
    `hash` VARCHAR(255) NULL,
    `guest` TINYINT(1) NULL DEFAULT '0',
    `first_login` DATETIME(3) NULL,
    `last_login` DATETIME(3) NULL,
    `newsletter` TINYINT(1) NULL DEFAULT '0',
    `birthday` DATE NULL,
    `last_order_date` DATETIME(3) NULL,
    `order_count` INT(11) NULL,
    `custom_fields` JSON NULL,
    `legacy_password` VARCHAR(255) NULL,
    `legacy_encoder` VARCHAR(255) NULL,
    `remote_address` VARCHAR(255) NULL,
    `tag_ids` JSON NULL,
    `requested_customer_group_id` BINARY(16) NULL,
    `bound_sales_channel_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.customer.custom_fields` CHECK (JSON_VALID(`custom_fields`)),
    CONSTRAINT `json.customer.tag_ids` CHECK (JSON_VALID(`tag_ids`)),
    KEY `fk.customer.customer_group_id` (`customer_group_id`),
    KEY `fk.customer.default_payment_method_id` (`default_payment_method_id`),
    KEY `fk.customer.sales_channel_id` (`sales_channel_id`),
    KEY `fk.customer.language_id` (`language_id`),
    KEY `fk.customer.last_payment_method_id` (`last_payment_method_id`),
    KEY `fk.customer.default_billing_address_id` (`default_billing_address_id`),
    KEY `fk.customer.default_shipping_address_id` (`default_shipping_address_id`),
    KEY `fk.customer.salutation_id` (`salutation_id`),
    KEY `fk.customer.requested_customer_group_id` (`requested_customer_group_id`),
    KEY `fk.customer.bound_sales_channel_id` (`bound_sales_channel_id`),
    CONSTRAINT `fk.customer.customer_group_id` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer.default_payment_method_id` FOREIGN KEY (`default_payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer.sales_channel_id` FOREIGN KEY (`sales_channel_id`) REFERENCES `sales_channel` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer.last_payment_method_id` FOREIGN KEY (`last_payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer.salutation_id` FOREIGN KEY (`salutation_id`) REFERENCES `salutation` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer.requested_customer_group_id` FOREIGN KEY (`requested_customer_group_id`) REFERENCES `customer_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer.bound_sales_channel_id` FOREIGN KEY (`bound_sales_channel_id`) REFERENCES `sales_channel` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customer_group_translation` (
    `name` VARCHAR(255) NOT NULL,
    `registration_title` VARCHAR(255) NULL,
    `registration_introduction` LONGTEXT NULL,
    `registration_only_company_registration` TINYINT(1) NULL DEFAULT '0',
    `registration_seo_meta_description` LONGTEXT NULL,
    `custom_fields` JSON NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    `customer_group_id` BINARY(16) NOT NULL,
    `language_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`customer_group_id`,`language_id`),
    CONSTRAINT `json.customer_group_translation.custom_fields` CHECK (JSON_VALID(`custom_fields`)),
    KEY `fk.customer_group_translation.customer_group_id` (`customer_group_id`),
    KEY `fk.customer_group_translation.language_id` (`language_id`),
    CONSTRAINT `fk.customer_group_translation.customer_group_id` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer_group_translation.language_id` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customer_address` (
    `id` BINARY(16) NOT NULL,
    `customer_id` BINARY(16) NOT NULL,
    `country_id` BINARY(16) NOT NULL,
    `country_state_id` BINARY(16) NULL,
    `salutation_id` BINARY(16) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `zipcode` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `company` VARCHAR(255) NULL,
    `street` VARCHAR(255) NOT NULL,
    `department` VARCHAR(255) NULL,
    `title` VARCHAR(255) NULL,
    `vat_id` VARCHAR(255) NULL,
    `phone_number` VARCHAR(255) NULL,
    `additional_address_line1` VARCHAR(255) NULL,
    `additional_address_line2` VARCHAR(255) NULL,
    `custom_fields` JSON NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.customer_address.custom_fields` CHECK (JSON_VALID(`custom_fields`)),
    KEY `fk.customer_address.customer_id` (`customer_id`),
    KEY `fk.customer_address.country_id` (`country_id`),
    KEY `fk.customer_address.country_state_id` (`country_state_id`),
    KEY `fk.customer_address.salutation_id` (`salutation_id`),
    CONSTRAINT `fk.customer_address.customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer_address.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer_address.country_state_id` FOREIGN KEY (`country_state_id`) REFERENCES `country_state` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer_address.salutation_id` FOREIGN KEY (`salutation_id`) REFERENCES `salutation` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customer_recovery` (
    `id` BINARY(16) NOT NULL,
    `hash` VARCHAR(255) NOT NULL,
    `customer_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customer_group` (
    `id` BINARY(16) NOT NULL,
    `display_gross` TINYINT(1) NULL DEFAULT '0',
    `registration_active` TINYINT(1) NULL DEFAULT '0',
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.customer_group.translated` CHECK (JSON_VALID(`translated`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customer_group_registration_sales_channels` (
    `customer_group_id` BINARY(16) NOT NULL,
    `sales_channel_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    PRIMARY KEY (`customer_group_id`,`sales_channel_id`),
    KEY `fk.customer_group_registration_sales_channels.customer_group_id` (`customer_group_id`),
    KEY `fk.customer_group_registration_sales_channels.sales_channel_id` (`sales_channel_id`),
    CONSTRAINT `fk.customer_group_registration_sales_channels.customer_group_id` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_group` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer_group_registration_sales_channels.sales_channel_id` FOREIGN KEY (`sales_channel_id`) REFERENCES `sales_channel` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customer_tag` (
    `customer_id` BINARY(16) NOT NULL,
    `tag_id` BINARY(16) NOT NULL,
    PRIMARY KEY (`customer_id`,`tag_id`),
    KEY `fk.customer_tag.customer_id` (`customer_id`),
    KEY `fk.customer_tag.tag_id` (`tag_id`),
    CONSTRAINT `fk.customer_tag.customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.customer_tag.tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;