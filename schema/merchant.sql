CREATE TABLE `merchant` (
    `id` BINARY(16) NOT NULL,
    `active` TINYINT(1) NULL DEFAULT '0',
    `public` TINYINT(1) NULL DEFAULT '0',
    `public_company_name` VARCHAR(255) NOT NULL,
    `public_owner` VARCHAR(255) NULL,
    `public_phone_number` VARCHAR(255) NULL,
    `public_email` VARCHAR(255) NULL,
    `public_opening_times` LONGTEXT NULL,
    `public_description` LONGTEXT NULL,
    `public_website` VARCHAR(255) NULL,
    `availability` INT(11) NULL,
    `availability_text` VARCHAR(255) NULL,
    `category_id` BINARY(16) NULL,
    `first_name` VARCHAR(255) NULL,
    `last_name` VARCHAR(255) NULL,
    `street` VARCHAR(255) NULL,
    `zip` VARCHAR(255) NULL,
    `city` VARCHAR(255) NULL,
    `country_id` BINARY(16) NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(1024) NOT NULL,
    `phone_number` VARCHAR(255) NULL,
    `imprint` LONGTEXT NULL,
    `tos` LONGTEXT NULL,
    `privacy` LONGTEXT NULL,
    `revocation` LONGTEXT NULL,
    `mollie_prod_key` VARCHAR(255) NULL,
    `mollie_test_key` VARCHAR(255) NULL,
    `mollie_test_enabled` TINYINT(1) NULL DEFAULT '0',
    `payment_methods` VARCHAR(255) NULL,
    `activation_code` VARCHAR(255) NULL,
    `sales_channel_id` BINARY(16) NOT NULL,
    `cover_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.merchant.sales_channel_id` (`sales_channel_id`),
    CONSTRAINT `fk.merchant.sales_channel_id` FOREIGN KEY (`sales_channel_id`) REFERENCES `sales_channel` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `merchant_product` (
    `merchant_id` BINARY(16) NOT NULL,
    `product_id` BINARY(16) NOT NULL,
    `product_version_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    PRIMARY KEY (`merchant_id`,`product_id`,`product_version_id`),
    KEY `fk.merchant_product.merchant_id` (`merchant_id`),
    KEY `fk.merchant_product.product_id` (`product_id`,`product_version_id`),
    CONSTRAINT `fk.merchant_product.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.merchant_product.product_id` FOREIGN KEY (`product_id`,`product_version_id`) REFERENCES `product` (`id`,`version_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `merchant_order` (
    `merchant_id` BINARY(16) NOT NULL,
    `order_id` BINARY(16) NOT NULL,
    `order_version_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    PRIMARY KEY (`merchant_id`,`order_id`,`order_version_id`),
    KEY `fk.merchant_order.merchant_id` (`merchant_id`),
    KEY `fk.merchant_order.order_id` (`order_id`,`order_version_id`),
    CONSTRAINT `fk.merchant_order.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.merchant_order.order_id` FOREIGN KEY (`order_id`,`order_version_id`) REFERENCES `order` (`id`,`version_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `merchant_media` (
    `merchant_id` BINARY(16) NOT NULL,
    `media_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    PRIMARY KEY (`merchant_id`,`media_id`),
    KEY `fk.merchant_media.merchant_id` (`merchant_id`),
    KEY `fk.merchant_media.media_id` (`media_id`),
    CONSTRAINT `fk.merchant_media.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.merchant_media.media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `merchant_shipping_method` (
    `merchant_id` BINARY(16) NOT NULL,
    `shipping_method_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    PRIMARY KEY (`merchant_id`,`shipping_method_id`),
    KEY `fk.merchant_shipping_method.merchant_id` (`merchant_id`),
    KEY `fk.merchant_shipping_method.shipping_method_id` (`shipping_method_id`),
    CONSTRAINT `fk.merchant_shipping_method.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.merchant_shipping_method.shipping_method_id` FOREIGN KEY (`shipping_method_id`) REFERENCES `shipping_method` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `merchant_reset_password_token` (
    `id` BINARY(16) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `merchant_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.merchant_reset_password_token.merchant_id` (`merchant_id`),
    CONSTRAINT `fk.merchant_reset_password_token.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `merchant_access_token` (
    `id` BINARY(16) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `merchant_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.merchant_access_token.merchant_id` (`merchant_id`),
    CONSTRAINT `fk.merchant_access_token.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `merchant_service` (
    `merchant_id` BINARY(16) NOT NULL,
    `service_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    PRIMARY KEY (`merchant_id`,`service_id`),
    KEY `fk.merchant_service.merchant_id` (`merchant_id`),
    KEY `fk.merchant_service.service_id` (`service_id`),
    CONSTRAINT `fk.merchant_service.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.merchant_service.service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;