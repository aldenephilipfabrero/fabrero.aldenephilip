<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
<div class="auth-container">
    <h2>Register</h2>
    <?php if($this->session->flashdata('auth_error')): ?>
        <div class="error"><?=html_escape($this->session->flashdata('auth_error'));?></div>
    <?php endif; ?>
    <form method="post" action="<?=site_url('auth/register');?>">
        <label>First Name</label>
        <input type="text" name="first_name" required>
        <label>Last Name</label>
        <input type="text" name="last_name" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="<?=site_url('auth/login');?>">Login</a></p>
</div>
</body>
</html>