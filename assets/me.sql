
CREATE TABLE 'wp_ac_addresses' (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL DEFAULT '',
    `address` varchar(255) DEFAULT NULL,
    `phone` varchar(30) DEFAULT NULL,
    `created_by` bigint(20) unsigned NOT NULL,
    `created_at` datetime NOT NULL,
    PRIMARY_KEY (`id`)

)ENGINE = InnoDB DEFAULT CHARSET=utf8;