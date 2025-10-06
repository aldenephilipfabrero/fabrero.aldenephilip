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
    /* Global Styles: Dark Background, White Text */
    body {
      font-family: 'Montserrat', sans-serif; /* Changed to a modern, geometric font */
      background: #0d0d0d; /* Deep Black Background */
      color: #eeeeee; /* Off-White Text */
      margin: 0;
      padding: 20px;
    }

    /* Button Style: Vibrant Orange Accent */
    .valorant-btn { /* Renamed to .orange-btn would be better, but keeping for direct substitution */
      background: #ff8c00; /* Vibrant Orange */
      color: #0d0d0d; /* Black Text on Orange for maximum contrast */
      padding: 12px 25px;
      border-radius: 4px; /* Slightly sharp corners */
      font-weight: bold;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    /* Button Hover Effect: Glow and Scale */
    .valorant-btn:hover {
      background: #ff6600; /* Darker Orange on Hover */
      box-shadow: 0 0 15px rgba(255, 140, 0, 0.7); /* Orange Glow */
      transform: translateY(-2px); /* Subtle lift instead of scale for a cleaner look */
    }

    /* Table Structure */
    table {
      width: 100%;
      border-collapse: collapse;
      overflow: hidden;
      border-radius: 8px; /* Slightly softer table corners */
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Subtle shadow on the table */
    }

    /* Table Header: Orange Accent */
    th {
      background: #ff8c00; /* Vibrant Orange Header */
      color: #0d0d0d; /* Black Text on Orange */
      text-transform: uppercase;
      font-weight: 700;
      padding: 15px 12px;
      text-align: left;
    }

    /* Table Data Cells: Dark Internal Color */
    td {
      padding: 12px;
      background: #1a1a1a; /* Dark Gray Cell Background */
      border-bottom: 1px solid #333333; /* Darker separator line */
    }

    /* Table Row Hover Effect: Light up */
    tr:hover td {
      background: #252525; /* Slightly lighter dark color on hover */
      transition: background 0.3s;
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