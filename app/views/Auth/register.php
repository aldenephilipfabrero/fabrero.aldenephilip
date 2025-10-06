<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 40%, #7c3aed 100%);
      color: #f1f5f9;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .card {
      background: rgba(15, 23, 42, 0.9);
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
      border: 1px solid rgba(59, 130, 246, 0.3);
      backdrop-filter: blur(10px);
    }

    .company-btn {
      background: linear-gradient(90deg, #2563eb, #4f46e5);
      color: #fff;
      padding: 0.75rem;
      border-radius: 0.5rem;
      font-weight: 600;
      transition: all 0.2s ease-in-out;
      letter-spacing: 0.5px;
    }

    .company-btn:hover {
      background: linear-gradient(90deg, #1d4ed8, #4338ca);
      transform: scale(1.03);
      box-shadow: 0 4px 14px rgba(37,99,235,0.4);
    }

    .form-input {
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
    }

    /* Hide browser's default password eye icon */
    input::-ms-reveal,
    input::-ms-clear {
      display: none !important;
    }
    input::-webkit-credentials-auto-fill-button,
    input::-webkit-password-toggle-button {
      visibility: hidden;
      display: none !important;
      pointer-events: none;
      position: absolute;
    }

    .logo {
      width: 60px;
      height: 60px;
      margin: 0 auto 1rem;
      display: block;
      filter: drop-shadow(0 0 6px rgba(37,99,235,0.4));
    }
  </style>
</head>
<body>

  <div class="card w-full max-w-sm text-center">
    <img src="https://cdn-icons-png.flaticon.com/512/2942/2942077.png" alt="Building Logo" class="logo">
    <h1 class="text-2xl font-bold text-blue-400 mb-6 tracking-wide">Create Account</h1>

    <form method="post" class="space-y-4 text-left">
      <!-- Username -->
      <div>
        <label class="block text-sm font-semibold text-gray-400 mb-1">Username</label>
        <input type="text" name="username" placeholder="Enter username" required class="form-input">
      </div>

      <!-- Password -->
      <div>
        <label class="block text-sm font-semibold text-gray-400 mb-1">Password</label>
        <div class="relative">
          <input type="password" id="register-password" name="password" placeholder="Enter password" required class="form-input pr-16">
          <button type="button" onclick="togglePassword('register-password', this)" class="absolute inset-y-0 right-3 text-sm text-blue-400 font-semibold">Show</button>
        </div>
      </div>

      <!-- Role -->
      <div>
        <label class="block text-sm font-semibold text-gray-400 mb-1">Role</label>
        <select name="role" class="form-input">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- Register button -->
      <button type="submit" class="company-btn w-full">Register</button>
    </form>

    <p class="text-center text-gray-400 mt-4 text-sm">
      Already have an account? 
      <a href="<?= site_url('auth/login') ?>" class="text-blue-400 font-semibold hover:underline">Login</a>
    </p>
  </div>

  <script>
  function togglePassword(id, btn) {
    const input = document.getElementById(id);
    if (input.type === "password") {
      input.type = "text";
      btn.textContent = "Hide";
    } else {
      input.type = "password";
      btn.textContent = "Show";
    }
  }
  </script>

</body>
</html>
