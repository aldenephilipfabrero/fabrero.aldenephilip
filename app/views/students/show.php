<?php 
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: " . site_url('auth/login'));
    exit;
}

$role = $_SESSION['role'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students List</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: linear-gradient(135deg, #1a0b1f 0%, #3a0d3e 40%, #5b1f69 70%, #7a3e8a 100%);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      min-height: 100vh;
      color: #fff;
      transition: all 0.4s ease;
    }

    .container {
      max-width: 1100px;
      margin: 40px auto;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.5);
      padding: 32px;
      backdrop-filter: blur(10px);
      transition: all 0.4s ease;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
    }

    h2 {
      margin: 0;
      font-size: 2.2rem;
      font-weight: 700;
      color: #fff;
      text-shadow: 0 2px 6px rgba(0,0,0,0.4);
    }

    .btn {
      display: inline-block;
      padding: 8px 18px;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .btn-success {
      background: linear-gradient(90deg, #7a3e8a 0%, #9c4dcc 100%);
      color: #fff;
    }

    .btn-success:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 14px rgba(156,77,204,0.5);
    }

    .btn-warning {
      background: linear-gradient(90deg, #b06ab3 0%, #ec9f05 100%);
      color: #222;
    }

    .btn-danger {
      background: linear-gradient(90deg, #d4145a 0%, #fbb03b 100%);
      color: #fff;
    }

    .btn-danger:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 10px rgba(244, 67, 54, 0.5);
    }

    .btn-primary {
      background: linear-gradient(90deg, #673ab7 0%, #9c27b0 100%);
      color: #fff;
    }

    .search-form {
      display: flex;
      gap: 10px;
      margin-bottom: 18px;
    }

    .search-form input {
      padding: 10px 14px;
      border-radius: 6px;
      border: 1px solid rgba(255,255,255,0.4);
      font-size: 1rem;
      flex: 1;
      background: rgba(255,255,255,0.15);
      color: #fff;
    }

    .card {
      overflow-x: auto;
      border-radius: 10px;
      background: rgba(255,255,255,0.08);
      box-shadow: 0 2px 6px rgba(0,0,0,0.4);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      color: #fff;
    }

    th, td {
      padding: 12px 16px;
      text-align: left;
      font-size: 1rem;
    }

    th {
      background: rgba(0,0,0,0.3);
      font-weight: 700;
      text-transform: uppercase;
    }

    tr:hover td {
      background: rgba(255,255,255,0.08);
    }

    .actions {
      display: flex;
      gap: 8px;
    }

    .pagination-container {
      margin-top: 24px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pagination-container ul {
      list-style: none;
      display: flex;
      gap: 6px;
      padding: 0;
      margin: 0;
    }

    .pagination-container a,
    .pagination-container strong {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 0.95rem;
      font-weight: 600;
      text-decoration: none;
      background: rgba(255,255,255,0.15);
      color: #fff;
      border: 1px solid rgba(255,255,255,0.25);
      transition: all 0.3s ease;
    }

    .pagination-container a:hover {
      background: linear-gradient(90deg, #5b1f69 0%, #7a3e8a 100%);
      color: #fff;
      transform: scale(1.05);
    }

    /* ✅ Logout center */
    .logout-container {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    /* ✅ Dark mode styles */
    body.dark {
      background: linear-gradient(135deg, #0c0212 0%, #1d0723 40%, #3a0d3e 70%, #4b1b63 100%);
      color: #ddd;
    }

    body.dark .container {
      background: rgba(0, 0, 0, 0.5);
      box-shadow: 0 8px 24px rgba(255,255,255,0.05);
    }

    .dark-toggle {
      background: transparent;
      border: none;
      font-size: 1.4rem;
      color: #fff;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .dark-toggle:hover {
      transform: scale(1.2);
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h2>Students List</h2>
      <div style="display:flex; gap:12px; align-items:center;">
        <?php if ($role === 'admin'): ?>
          <a href="<?= site_url('/students/create'); ?>" class="btn btn-success"><i class="fa fa-user-plus"></i> Add Student</a>
        <?php endif; ?>
        <button class="dark-toggle" id="darkToggle"><i class="fa fa-moon"></i></button>
      </div>
    </div>

    <!-- ✅ Search Form -->
    <form method="get" action="<?=site_url('/students');?>" class="search-form">
        <input type="text" name="q" placeholder="Search..." value="<?=isset($_GET['q']) ? html_escape($_GET['q']) : '';?>">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
    </form>

    <!-- ✅ Table -->
    <div class="card">
      <table>
        <thead>
          <tr>
            <th><i class="fa fa-id-card"></i> ID</th>
            <th><i class="fa fa-user"></i> Lastname</th>
            <th><i class="fa fa-user-astronaut"></i> Firstname</th>
            <th><i class="fa fa-envelope"></i> Email</th>
            <?php if ($role === 'admin'): ?>
              <th><i class="fa fa-gears"></i> Action</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($students)): ?>
            <?php foreach(html_escape($students) as $student): ?>
              <tr>
                <td><?=$student['id'];?></td>
                <td><?=$student['last_name'];?></td>
                <td><?=$student['first_name'];?></td>
                <td><?=$student['email'];?></td>
                <?php if ($role === 'admin'): ?>
                  <td class="actions">
                    <a href="<?=site_url('students/update/'.$student['id']);?>" class="btn btn-warning"><i class="fa fa-pen"></i> Edit</a>
                    <a href="<?=site_url('students/delete/'.$student['id']);?>" class="btn btn-danger" onclick="return confirm('Delete this student?');"><i class="fa fa-trash"></i> Delete</a>
                  </td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="6" style="text-align:center; padding:30px;">No records found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- ✅ Pagination -->
    <?php if (!empty($page)): ?>
    <div class="pagination-container">
      <?= $page; ?>
    </div>
    <?php endif; ?>

    <!-- ✅ Centered Logout -->
    <div class="logout-container">
      <a href="<?=site_url('auth/logout');?>" class="btn btn-danger"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
  </div>

  <script>
    const toggle = document.getElementById("darkToggle");
    const body = document.body;

    if(localStorage.getItem("darkMode") === "1") {
      body.classList.add("dark");
      toggle.innerHTML = '<i class="fa fa-sun"></i>';
    }

    toggle.addEventListener("click", () => {
      body.classList.toggle("dark");
      const isDark = body.classList.contains("dark");
      toggle.innerHTML = isDark ? '<i class="fa fa-sun"></i>' : '<i class="fa fa-moon"></i>';
      localStorage.setItem("darkMode", isDark ? "1" : "0");
    });
  </script>
</body>
</html>
