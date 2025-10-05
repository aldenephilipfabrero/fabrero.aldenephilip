CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Optionally insert an admin user (password: admin123)
-- Use PHP to generate a bcrypt hash and paste it below. Example (run in PHP CLI):
-- php -r "echo password_hash('admin123', PASSWORD_DEFAULT).PHP_EOL;"
-- Then run an insert like:
-- INSERT INTO `users` (`first_name`,`last_name`,`email`,`password`,`role`,`created_at`) VALUES ('Admin','User','admin@example.com', '<PASTE_HASH_HERE>', 'admin', NOW());