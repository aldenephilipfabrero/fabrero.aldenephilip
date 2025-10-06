User Authentication migration notes

This file includes example SQL to create a `users` table used by the auth example, and an alternative to add auth columns to the existing `students` table.

1) Create a new `users` table (recommended)

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

2) Or add `password` and `role` to existing `students` table

```sql
ALTER TABLE `students`
  ADD COLUMN `password` varchar(255) NULL AFTER `email`,
  ADD COLUMN `role` enum('admin','user') NOT NULL DEFAULT 'user' AFTER `password`;
```

3) Create an admin user (example)

```php
<?php
// run in tinker or a small script with your DB connection
$hash = password_hash('adminpassword', PASSWORD_DEFAULT);
// insert into users (username,password,role,created_at) values ('admin', '$hash', 'admin', now());
```

Notes:
- The example auth library uses a `users` table. You can adapt it to use `students` by updating Lauth.php query table names.
- Passwords are hashed with PHP's password_hash().
