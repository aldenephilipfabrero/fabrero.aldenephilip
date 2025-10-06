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
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Rajdhani', sans-serif;
      background: #0f1923;
      color: #ece8e1;
    }
    .valorant-btn {
      background: #ff4655;
      color: #ece8e1;
      padding: 10px 20px;
      border-radius: 0.5rem;
      font-weight: bold;
      letter-spacing: 1px;
      transition: all 0.3s;
    }
    .valorant-btn:hover {
      background: #e03444;
      box-shadow: 0 0 10px #ff4655;
      transform: scale(1.05);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      overflow: hidden;
      border-radius: 0.5rem;
    }
    th {
      background: #ff4655;
      color: #ece8e1;
      text-transform: uppercase;
      font-weight: bold;
      padding: 12px;
    }
    td {
      padding: 12px;
      background: #1c252f;
      border-bottom: 1px solid #2f3b45;
    }
    tr:hover td {
      background: #252f3b;
      transition: 0.3s;
    }
  </style>
</head>
<body class="p-6">

  <!-- User Info -->
  <div class="mb-6 text-center">
    <h1 class="text-5xl font-bold tracking-widest text-[#ff4655]">
      STUDENTS DASHBOARD
    </h1>
    <p class="mt-2 text-lg">Welcome, <span class="font-bold"><?= $this->call->library('session');
('username') ?></span></p>
    <p class="text-gray-400">Role: <?= $this->call->library('session');
('role') ?></p>
  </div>

  <!-- Search Bar -->
  <form method="get" action="<?=site_url('/students')?>" class="mb-6 flex justify-center">
    <input 
      type="text" 
      name="q" 
      value="<?=html_escape($_GET['q'] ?? '')?>" 
      placeholder="Search student..." 
      class="px-4 py-2 w-64 rounded-l-md focus:outline-none bg-[#1c252f] border border-gray-700 text-white placeholder-gray-400">
    <button type="submit" class="valorant-btn rounded-r-md">🔍</button>
  </form>

  <!-- Container -->
  <div class="max-w-5xl mx-auto bg-[#131a22] p-6 rounded-xl shadow-lg">
    <table>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
      <?php foreach(html_escape($students) as $student): ?>
      <tr>
        <td><?= $student['id']; ?></td>
        <td><?= $student['first_name']; ?></td>
        <td><?= $student['last_name']; ?></td>
        <td><?= $student['email']; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>

    <!-- Pagination + Logout -->
    <div class="mt-6 flex justify-between items-center">
      <div class="pagination flex space-x-2 text-[#ff4655] font-bold">
        <?=$page ?? ''?>
      </div>
      <a class="valorant-btn" href="<?=site_url('auth/logout');?>">Logout</a>
    </div>
  </div>

</body>
</html>