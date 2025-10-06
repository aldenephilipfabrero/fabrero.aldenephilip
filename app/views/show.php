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
  <title>Showdata - Company Portal</title>
  <style>
:root {
  --primary: #ff6699;       /* Soft pink */
  --primary-dark: #e05588;  /* Darker pink */
  --accent: #ffd1dc;        /* Light pastel accent */
  --bg-gradient: linear-gradient(135deg, #ffe6eb, #ffd1dc, #ffc1cc);
  --card-bg: #ffffff;
  --text: #4a2c2a;
  --muted: #a77b7b;
  --radius: 10px;
}

body {
  font-family: "Segoe UI", Roboto, Arial, sans-serif;
  background: var(--bg-gradient);
  margin: 0;
  padding: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  color: var(--text);
}

header {
  text-align: center;
  margin-bottom: 30px;
}

header img {
  width: 80px;
  height: 80px;
  margin-bottom: 10px;
  background: #fff;
  border-radius: 50%;
  padding: 8px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

h1 {
  font-size: 1.8rem;
  font-weight: 700;
  color: var(--primary);
  margin-bottom: 10px;
  letter-spacing: 1px;
}

/* ✅ Table Card */
.table-wrapper {
  width: 90%;
  max-width: 1000px;
  background: var(--card-bg);
  border-radius: var(--radius);
  box-shadow: 0 6px 25px rgba(0,0,0,0.1);
  overflow: hidden;
  transition: transform 0.2s ease-in-out;
}

.table-wrapper:hover {
  transform: translateY(-3px);
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 14px 16px;
  text-align: left;
}

th {
  background: var(--primary);
  color: #fff;
  text-transform: uppercase;
  font-size: 0.9rem;
  letter-spacing: 0.5px;
}

tr:nth-child(even) {
  background: #fff0f5;
}

tr:hover {
  background: #ffe6ee;
}

td {
  font-size: 0.95rem;
  color: var(--text);
  border-bottom: 1px solid #f3c4c4;
}

/* ✅ Buttons */
a {
  display: inline-block;
  margin-right: 6px;
  padding: 6px 12px;
  border-radius: 6px;
  font-size: 0.85rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s;
}

a[href*="update"] {
  background: var(--primary);
  color: #fff;
}

a[href*="update"]:hover {
  background: var(--primary-dark);
}

a[href*="delete"] {
  background: #d93025;
  color: #fff;
}

a[href*="delete"]:hover {
  background: #b3281e;
}

.btn {
  display: inline-block;
  margin-top: 25px;
  background: var(--primary);
  color: #fff;
  padding: 12px 22px;
  border-radius: 8px;
  font-size: 0.95rem;
  font-weight: 600;
  text-transform: uppercase;
  text-decoration: none;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  border: none;
}

.btn:hover {
  background: var(--primary-dark);
  transform: translateY(-2px);
}

.btn.logout {
  background: #d93025;
}

.btn.logout:hover {
  background: #b3281e;
}

/* ✅ Search bar */
.search-box {
  margin-bottom: 15px;
  width: 90%;
  max-width: 1000px;
  text-align: right;
}

.search-box input[type="text"] {
  padding: 8px 12px;
  border: 1.5px solid var(--primary);
  border-radius: 6px;
  background: #fff;
  color: var(--text);
  font-size: 0.95rem;
  outline: none;
}

.search-box button {
  padding: 8px 16px;
  margin-left: 6px;
  background: var(--primary);
  color: #fff;
  font-weight: 600;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.search-box button:hover {
  background: var(--primary-dark);
}

/* ✅ Pagination */
.pagination {
  margin: 25px 0;
  display: flex;
  justify-content: center;
  gap: 8px;
  list-style: none;
  padding: 0;
}

.pagination a, 
.pagination strong {
  padding: 8px 14px;
  border: 1.5px solid var(--primary);
  background: #fff;
  color: var(--text);
  text-decoration: none;
  font-weight: 600;
  border-radius: 6px;
  transition: all 0.3s ease;
}

.pagination a:hover {
  background: var(--primary);
  color: #fff;
}

.pagination strong {
  background: var(--primary);
  color: #fff;
  cursor: default;
}
  </style>
</head>
<body>

  <header>
    <!-- 🏢 Building logo with pink theme -->
    <img src="https://cdn-icons-png.flaticon.com/512/2942/2942077.png" alt="Building Logo">
    <h1>Employee Data</h1>
  </header>

  <div class="search-box">
      <form method="get" action="<?=site_url('/students');?>">
          <input type="text" name="q" placeholder="Search..." value="<?=isset($_GET['q']) ? html_escape($_GET['q']) : '';?>">
          <button type="submit">Search</button>
      </form>
  </div>

  <div class="table-wrapper">
    <table>
      <tr>
        <th>ID</th>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Email</th>
        <th>Role</th>
        <?php if ($role === 'admin'): ?>
          <th>Action</th>
        <?php endif; ?>
      </tr>
      <?php if (!empty($students)): ?>
          <?php foreach(html_escape($students) as $student): ?>
          <tr>
            <td><?=$student['id'];?></td>
            <td><?=$student['last_name'];?></td>
            <td><?=$student['first_name'];?></td>
            <td><?=$student['email'];?></td>
            <td><?=$student['Role'];?></td>
            <?php if ($role === 'admin'): ?>
            <td>
              <a href="<?=site_url('students/update/'.$student['id']);?>">Update</a>
              <a href="<?=site_url('students/delete/'.$student['id']);?>">Delete</a>
            </td>
            <?php endif; ?>
          </tr>
          <?php endforeach; ?>
      <?php else: ?>
          <tr>
            <td colspan="6" style="text-align:center; color:var(--muted);">No records found.</td>
          </tr>
      <?php endif; ?>
    </table>
  </div>

  <?php if (!empty($page)): ?>
    <ul class="pagination">
        <?= $page; ?>
    </ul>
  <?php endif; ?>

  <?php if ($role === 'admin'): ?>
    <a href="<?=site_url('students/create');?>" class="btn">+ Create Record</a>
  <?php endif; ?>

  <a href="<?=site_url('auth/logout');?>" class="btn logout">Logout</a>

</body>
</html>
