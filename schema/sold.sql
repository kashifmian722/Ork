CREATE TABLE `sold_voucher` (
    `id` BINARY(16) NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `value` JSON NULL,
    `merchant_id` BINARY(16) NULL,
    `order_line_item_id` BINARY(16) NULL,
    `redeemed_at` DATETIME(3) NULL,
    `order_line_item_version_id` BINARY(16) NOT NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `json.sold_voucher.value` CHECK (JSON_VALID(`value`)),
    KEY `fk.sold_voucher.order_line_item_id` (`order_line_item_id`,`order_line_item_version_id`),
    KEY `fk.sold_voucher.merchant_id` (`merchant_id`),
    CONSTRAINT `fk.sold_voucher.order_line_item_id` FOREIGN KEY (`order_line_item_id`,`order_line_item_version_id`) REFERENCES `order_line_item` (`id`,`version_id`) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT `fk.sold_voucher.merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;