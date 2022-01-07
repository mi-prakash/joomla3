CREATE TABLE IF NOT EXISTS `#__folio` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` varchar(250) NOT NULL DEFAULT '',
    `alias` varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT = 1;