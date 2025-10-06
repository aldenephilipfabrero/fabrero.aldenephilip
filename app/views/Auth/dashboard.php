<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
      color: #f1f5f9;
      min-height: 100vh;
    }

    .company-btn {
      background: #2563eb;
      color: #fff;
      padding: 10px 22px;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.2s ease-in-out;
    }
    .company-btn:hover {
      background: #1e40af;
      transform: scale(1.03);
      box-shadow: 0 4px 14px rgba(37,99,235,0.4);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      overflow: hidden;
      border-radius: 0.75rem;
    }

    th {
      background: #1e293b;
      color: #f8fafc;
      text-transform: uppercase;
      font-size: 0.8rem;
      font-weight: 600;
      padding: 14px;
      border-bottom: 1px solid #334155;
      text-align: left;
    }

    td {
      padding: 14px;
      background: #0f172a;
      border-bottom: 1px solid #1e293b;
      color: #e2e8f0;
      font-size: 0.95rem;
    }

    tr:hover td {
      background: #1e293b;
      transition: 0.3s;
    }

    .card {
      background: #0f172a;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.45);
      padding: 2rem;
    }

    .heading {
      font-size: 2rem;
      font-weight: 700;
      color: #2563eb;
      letter-spacing: 0.5px;
    }
  </style>
</head>
<body class="p-8">

  <!-- Header -->
  <div class="text-center mb-10">
    <h1 class="heading tracking-wide">Students Dashboard</h1>
    <p class="text-gray-300 text-lg mt-2">
      Welcome, <span class="font-semibold text-white">
        <?= $this->call->library('session');('username') ?>
      </span>
    </p>
    <p class="text-sm text-gray-500">Role: <?= $this->call->library('session');('role') ?></p>
  </div>

  <!-- Search Bar -->
  <form method="get" action="<?= site_url('/students') ?>" class="mb-8 flex justify-center">
    <input 
      type="text"
      name="q"
      value="<?= html_escape($_GET['q'] ?? '') ?>"
      placeholder="Search student..."
      class="px-4 py-2 w-72 rounded-l-lg focus:outline-none bg-[#1e293b] border border-gray-600 text-white placeholder-gray-400">
    <button type="submit" class="company-btn rounded-r-lg">Search</button>
  </form>

  <!-- Main Card -->
  <div class="max-w-5xl mx-auto card">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach(html_escape($students) as $student): ?>
        <tr>
          <td><?= $student['id']; ?></td>
          <td><?= $student['first_name']; ?></td>
          <td><?= $student['last_name']; ?></td>
          <td><?= $student['email']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Pagination + Logout -->
    <div class="mt-6 flex justify-between items-center">
      <div class="text-blue-400 font-semibold">
        <?= $page ?? '' ?>
      </div>
      <a class="company-btn" href="<?= site_url('auth/logout'); ?>">Logout</a>
    </div>
  </div>

</body>
</html>
