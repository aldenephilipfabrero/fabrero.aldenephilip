<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 40%, #7c3aed 100%);
      color: #f1f5f9;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      background: rgba(15, 23, 42, 0.9);
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
      border: 1px solid rgba(59, 130, 246, 0.3);
      backdrop-filter: blur(8px);
      width: 100%;
      max-width: 420px;
    }

    .logo {
      width: 70px;
      height: 70px;
      margin: 0 auto 1rem;
      display: block;
      filter: drop-shadow(0 0 6px rgba(37,99,235,0.4));
    }

    h1 {
      color: #60a5fa;
      text-align: center;
      font-weight: 700;
      font-size: 1.6rem;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      text-transform: uppercase;
      font-size: 0.8rem;
      font-weight: 600;
      color: #94a3b8;
      margin-bottom: 5px;
    }

    .form-input, select.form-input {
      background: #1e293b;
      border: 1px solid #334155;
      color: #f8fafc;
      border-radius: 0.5rem;
      padding: 0.75rem;
      width: 100%;
      transition: 0.2s;
    }

    .form-input:focus {
      outline: none;
      border-color: #2563eb;
      box-shadow: 0 0 0 2px rgba(37,99,235,0.4);
    }

    select.form-input {
      appearance: none;
      background-image: url('data:image/svg+xml;utf8,<svg fill="white" height="18" viewBox="0 0 20 20" width="18" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 7l4.5 4.5L14.5 7z"/></svg>');
      background-repeat: no-repeat;
      background-position: right 0.75rem center;
      background-size: 0.9rem;
      cursor: pointer;
    }

    .company-btn {
      background: linear-gradient(90deg, #2563eb, #4f46e5);
      color: #fff;
      padding: 0.75rem;
      border-radius: 0.5rem;
      font-weight: 600;
      transition: all 0.2s ease-in-out;
      letter-spacing: 0.5px;
      width: 100%;
    }

    .company-btn:hover {
      background: linear-gradient(90deg, #1d4ed8, #4338ca);
      transform: scale(1.03);
      box-shadow: 0 4px 14px rgba(37,99,235,0.4);
    }

    .back-btn {
      display: inline-block;
      margin-top: 20px;
      color: #60a5fa;
      font-weight: 600;
      text-decoration: none;
      font-size: 0.9rem;
      transition: color 0.3s;
    }

    .back-btn:hover {
      color: #93c5fd;
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <?php if (!empty($this->session->userdata('flash_message'))): ?>
    <div style="margin-bottom:16px;padding:12px;border-radius:8px;background:#ecfeff;color:#064e3b;max-width:420px;text-align:left;">
      <?= html_escape($this->session->userdata('flash_message')) ?>
    </div>
  <?php endif; ?>

  <form class="card" action="<?= html_escape(site_url('students/update/'.($student['id'] ?? ''))); ?>" method="post" novalidate aria-label="Update student form">
    <img src="https://cdn-icons-png.flaticon.com/512/2942/2942077.png" alt="Building Logo" class="logo">
    <h1>Update User</h1>

    <!-- Last Name -->
    <label for="last_name">Last Name</label>
  <input type="text" id="last_name" name="last_name" value="<?= html_escape($student['last_name'] ?? '') ;?>" required class="form-input">

    <!-- First Name -->
    <label for="first_name">First Name</label>
  <input type="text" id="first_name" name="first_name" value="<?= html_escape($student['first_name'] ?? '') ;?>" required class="form-input">

    <!-- Email -->
    <label for="email">Email</label>
  <input type="email" id="email" name="email" value="<?= html_escape($student['email'] ?? '') ;?>" required class="form-input">

    <!-- Role Dropdown -->
    <label for="role">Role</label>
    <select id="role" name="role" required class="form-input">
      <?php $roleVal = $student['Role'] ?? ''; ?>
      <option value="Staff" <?= ($roleVal === 'Staff') ? 'selected' : '' ?>>Staff</option>
      <option value="Full Stack Developer" <?= ($roleVal === 'Full Stack Developer') ? 'selected' : '' ?>>Full Stack Developer</option>
      <option value="Front-End Developer" <?= ($roleVal === 'Front-End Developer') ? 'selected' : '' ?>>Front-End Developer</option>
      <option value="Back-End Developer" <?= ($roleVal === 'Back-End Developer') ? 'selected' : '' ?>>Back-End Developer</option>
      <option value="Project Manager" <?= ($roleVal === 'Project Manager') ? 'selected' : '' ?>>Project Manager</option>
    </select>

    <button type="submit" class="company-btn mt-3">Update</button>

    <a href="<?= html_escape(site_url('students')); ?>" class="back-btn">← Back to Records</a>
  </form>

</body>
</html>
