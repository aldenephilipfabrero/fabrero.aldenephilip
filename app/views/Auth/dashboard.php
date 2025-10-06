<h1>Welcome, <?= html_escape($session->userdata['username'] ?? $session->userdata['user_email'] ?? 'Guest') ?>!</h1>
<p>Role: <?= html_escape($session->userdata['role'] ?? $session->userdata['user_role'] ?? 'guest') ?></p>
<a href="<?= site_url('auth/logout') ?>">Logout</a>
