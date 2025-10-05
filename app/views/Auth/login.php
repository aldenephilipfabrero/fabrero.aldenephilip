<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
<div class="auth-container">
    <h2>Login</h2>
    <?php if($this->session->flashdata('auth_error')): ?>
        <div class="error"><?=html_escape($this->session->flashdata('auth_error'));?></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('auth_success')): ?>
        <div class="success"><?=html_escape($this->session->flashdata('auth_success'));?></div>
    <?php endif; ?>
    <form method="post" action="<?=site_url('auth/login');?>">
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="<?=site_url('auth/register');?>">Register</a></p>
</div>
</body>
</html>