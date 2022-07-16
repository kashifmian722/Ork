CREATE TABLE `dead_message` (
    `id` BINARY(16) NOT NULL,
    `original_message_class` LONGTEXT NOT NULL,
    `serialized_original_message` LONGBLOB NOT NULL,
    `handler_class` LONGTEXT NOT NULL,
    `encrypted` TINYINT(1) NOT NULL DEFAULT '0',
    `error_count` INT(11) NOT NULL,
    `next_execution_time` DATETIME(3) NOT NULL,
    `exception` LONGTEXT NOT NULL,
    `exception_message` LONGTEXT NOT NULL,
    `exception_file` LONGTEXT NOT NULL,
    `exception_line` INT(11) NOT NULL,
    `scheduled_task_id` BINARY(16) NULL,
    `created_at` DATETIME(3) NOT NULL,
    `updated_at` DATETIME(3) NULL,
    PRIMARY KEY (`id`),
    KEY `fk.dead_message.scheduled_task_id` (`scheduled_task_id`),
    CONSTRAINT `fk.dead_message.scheduled_task_id` FOREIGN KEY (`scheduled_task_id`) REFERENCES `scheduled_task` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;